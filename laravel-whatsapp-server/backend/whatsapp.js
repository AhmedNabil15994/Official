import { existsSync, unlinkSync, readdir ,appendFileSync,readFileSync,writeFileSync } from 'fs'
import { writeFile } from 'fs/promises'
import { join } from 'path'
import fetch from "node-fetch";
import pino from 'pino'
import makeWASocket, {
    makeWALegacySocket,
    useSingleFileAuthState,
    useSingleFileLegacyAuthState,
    makeInMemoryStore,
    Browsers,
    DisconnectReason,
    delay,
    downloadContentFromMessage,
    WA_DEFAULT_EPHEMERAL,
    getDevice,
} from '@adiwajshing/baileys'
import { toDataURL } from 'qrcode'
import __dirname from './dirname.js'
import response from './response.js'
import {addDataToFile} from './utils.js'
import mime from 'mime-types'
import needle from 'needle';
import { createClient } from 'redis';
const redisClient = createClient('127.0.0.1','6379');

try{
    await redisClient.connect();
}catch{
    redisClient.on('error', (err) => console.log('Redis Client Error', err));
}
const sessions = new Map()
const retries = new Map()
const sessionsDir = (sessionId = '') => {
    return join(__dirname, 'sessions', sessionId ? `${sessionId}.json` : '')
}
const isSessionExists = (sessionId) => {
    return sessions.has(sessionId)
}
const isSessionFileExists = (name) => {
    return existsSync(sessionsDir(name))
}

const shouldReconnect = (sessionId) => {
    let maxRetries = parseInt(process.env.MAX_RETRIES ?? 0)
    let attempts = retries.get(sessionId) ?? 0

    maxRetries = maxRetries < 1 ? 1 : maxRetries

    if (attempts < maxRetries) {
        ++attempts

        retries.set(sessionId, attempts)

        return true
    }

    return false
}

const createSession = async (sessionId, isLegacy = false, res = null) => {
    const sessionFile = (isLegacy ? 'legacy_' : 'md_') + sessionId

    const logger = pino({ level: 'warn' })

    const store = makeInMemoryStore({ logger })

    // let currentTime = Math.floor(Date.now() / 1000);
    // await redisClient.set(sessionId+"_conversations",'')
    // await redisClient.set(sessionId+"_messages",'')

    const { state, saveState } = isLegacy
        ? useSingleFileLegacyAuthState(sessionsDir(sessionFile))
        : useSingleFileAuthState(sessionsDir(sessionFile))

    /**
     * @type {import('@adiwajshing/baileys').CommonSocketConfig}
     */
    const waConfig = {
        auth: state,
        printQRInTerminal: process.env.PRINT_QR ?? false,
        logger,
        browser: Browsers.macOS('Wloop'),
        // Browsers.ubuntu('Chrome')
    }

    /**
     * @type {import('@adiwajshing/baileys').AnyWASocket}
     */
    const wa = isLegacy ? makeWALegacySocket(waConfig) : makeWASocket.default(waConfig)
    if (!isLegacy) {
        store.readFromFile(sessionsDir(`${sessionId}_store`))
        store.bind(wa.ev)
    }
    sessions.set(sessionId, { ...wa, store, isLegacy })
    // incoming message
    wa.ev.on('messages.upsert', async m => {
        try{
            const msg = m.messages[0]
            if (!msg.message) return // if there is no text or media message
            const messageType = Object.keys (msg.message)[0]// get what type of message it is -- text, image, video
            // if the message is an image
            // console.log(msg)
            if(msg.key.remoteJid !== 'status@broadcast'){
                let messageObj = await reformatMessageObj(sessionId,msg,messageType)
                let msgObjWebhook  = messageObj
                msgObjWebhook.status = messageObj.status - 1
                await needle.post(process.env.BACKEND_URL+'/webhooks/messages-webhook', {
                    conversation:{
                            id: msg.key.remoteJid,
                            lastTime: messageObj.time,
                            lastMessage : msgObjWebhook
                    },
                    sessionId:sessionId,
                }, function(err, resp, body){});
                msg.message = messageObj;
                let messageItemObj = messageObj
                let conversationItemObj = {
                    id: msg.key.remoteJid,
                    lastTime: messageObj.time,
                    // lastMessage : messageObj
                }
                if(messageObj.body !== undefined){
                    await processRedisData(redisClient,sessionId+"_messages",messageItemObj)
                    await processRedisData(redisClient,sessionId+"_conversations",conversationItemObj)
                }
            }

        }catch (e){
            console.log('error on upsert',e.message);
        }

    })

    // Ack updates
    wa.ev.on('messages.update', async m => {
        try {
            if(m[0].key.remoteJid !== 'status@broadcast'){
                await needle.post(process.env.BACKEND_URL+'/webhooks/messages-webhook', {
                    messageStatus:{
                        id:m[0].key.id,
                        status:m[0].update.status,
                        statusText: formatStatusText(m[0].update.status),
                        fromMe:m[0].key.fromMe,
                        chatId:m[0].key.remoteJid
                    },
                    sessionId:sessionId,
                }, function(err, resp, body){});
                // await addDataToFile(sessionId,m[0],'messageStatus')
                await processRedisData(redisClient,sessionId+"_messages",{
                    id:m[0].key.id,
                    status:m[0].update.status,
                    statusText: formatStatusText(m[0].update.status),
                    fromMe:m[0].key.fromMe,
                    time:Math.floor(Date.now() / 1000)
                })
            }
        }catch (e){
            console.log('error on messages.update', e.message);
        }
    })

    // Dialog Last Time updates
    wa.ev.on('chats.update', async m => {
        try{
            if(m[0].id !== 'status@broadcast'){
                await needle.post(process.env.BACKEND_URL+'/webhooks/messages-webhook', {
                    conversationStatus:{
                        data:m
                    },
                    sessionId:sessionId,
                }, function(err, resp, body){});
                // m[0]['image'] = await getSession(sessionId).profilePictureUrl(m[0].id, 'image')
                await processRedisData(redisClient,sessionId+"_conversations",m[0])

                // if(('pin' in m[0]) || ('archive' in m[0])){
                //     await addDataToFile(sessionId,m[0],'chatUpdated')
                // }
            }
        }catch (e){
            console.log('error on chat.update', e.message);
        }
    })

    // Dialog Delete Event // Configured by Ahmed Nabil
    wa.ev.on('chats.deleted', async m => {
        try{
            if(m[0].id !== 'status@broadcast'){
                await needle.post(process.env.BACKEND_URL+'/webhooks/messages-webhook', {
                    chatDeleted:{
                        id:m[0].id
                    },
                    sessionId:sessionId,
                }, function(err, resp, body){});
                await processRedisData(redisClient,sessionId+"_conversations",{
                    id: m[0].id,
                    deleted_by: 1,
                    deleted_at: Math.floor(Date.now() / 1000)
                })
                // await addDataToFile(sessionId,m[0],'chatDeleted')
            }
        }catch (e){
            console.log('chats.deleted',e.message);
        }

    })
    wa.ev.on('chats.set',({ chats }) => {
        try{
            if (isLegacy) {
                store.chats.insertIfAbsent(...chats)
            }
        }catch (e){
            console.log('chats.set',e.message);
        }

    })

    // wa.ev.on('messages.set', item => console.log(`recv ${item.messages.length} messages (is latest: ${item.isLatest})`))
    // wa.ev.on('message-receipt.update', m => console.log(m))

    // wa.ev.on('presence.update', m => console.log(m))
    // wa.ev.on('call', item => console.log('recv call event', item))

    // listen for when the auth credentials is updated
    wa.ev.on('creds.update', saveState)

    // Configured by Ahmed Nabil
    wa.ev.on('labels.set', m => {
        // console.log(m)
    })

    // Configured by Ahmed Nabil
    wa.ev.on('labels.delete', m => {
        // console.log(m)
    })

    wa.ws.on('CB:stream:error', (node) => {
        try{
            if(Array.isArray(node.content) && node.content[0].attrs.type == 'device_removed'){
                needle.post(process.env.BACKEND_URL+'/webhooks/messages-webhook', {
                    connectionStatus:{
                        type:'removed'
                    },
                    sessionId:sessionId,
                }, function(err, resp, body){});
            }
        }catch(e){
            console.log('CB:stream:erro',e.message);
        }

    });

    wa.ws.on('CB:iq,,pair-success', async (stanza) => {
        try{
            await needle.post(process.env.BACKEND_URL+'/webhooks/messages-webhook', {
                connectionStatus:{
                    type:'connected'
                },
                sessionId:sessionId,
            }, function(err, resp, body){});
            sleep(1000)
            await needle.get("http://"+process.env.HOST+":"+process.env.PORT+"/messages/fetchDialogs?id="+sessionId, {id:sessionId}, function(err, resp, body){});
            sleep(3000)
            await needle.get("http://"+process.env.HOST+":"+process.env.PORT+"/messages/fetchMessages?id="+sessionId, {id:sessionId}, function(err, resp, body){});
        }catch (e){
            console.log('CB:iq,,pair-success',e.message);
        }

    });

    // wa.ev.on('contacts.upsert', m => console.log(m))
    // wa.ev.on('contacts.set', item => console.log(`recv ${item.contacts.length} contacts`))

    wa.ev.on('connection.update', async (update) => {
        try{
            const { connection, lastDisconnect } = update
            const statusCode = lastDisconnect?.error?.output?.statusCode
            let messages = []
            if (connection === 'open' && connection !==undefined) {
                if(retries.length>0){
                    retries.delete(sessionId)
                }
                var requestOptions = {
                    method: 'GET',
                    headers: {
                        SESSIONID: sessionId
                    },
                    redirect: 'follow'
                };
                fetch(process.env.BACKEND_URL+"/instances/status?status=connected", requestOptions)
                    .then(response => response.text())
                    .then(result => '')
                    .catch(error =>{ console.log('error instance', error)});
            }

            if (connection === 'close') {
                if (statusCode === DisconnectReason.loggedOut || !shouldReconnect(sessionId)) {
                    if (res && !res.headersSent) {
                        response(res, 500, false, 'Unable to create session.')
                    }

                    return deleteSession(sessionId, isLegacy)
                }

                setTimeout(
                    () => {
                        createSession(sessionId, isLegacy, res)
                    },
                    statusCode === DisconnectReason.restartRequired ? 0 : parseInt(process.env.RECONNECT_INTERVAL ?? 0)
                )
            }

            if (update.qr) {
                if (res && !res.headersSent) {
                    try {
                        const qr = await toDataURL(update.qr)

                        response(res, 200, true, 'QR code received, please scan the QR code.', { qr })

                        return
                    } catch {
                        response(res, 500, false, 'Unable to create QR code.')
                    }
                }

                try {
                    await wa.logout()
                } catch {
                } finally {
                    deleteSession(sessionId, isLegacy)
                }
            }

        }catch{
            console.log('connection.update',e.message);
        }

    })
}

function sleep(ms) {
  return new Promise((resolve) => {
    setTimeout(resolve, ms);
  });
}

const processRedisData = async(client,key,newData) =>{
    let oldData = await client.get(key);
    if(oldData != 'null' && oldData != null && oldData != ''){
        oldData = JSON.parse(oldData)
        let found = 0;
        oldData.forEach((itemObj,index) => {
            if(itemObj.id === newData.id){
                for(var k in newData){
                    if(k == 'unreadCount'){
                        itemObj['unreadCount']= (itemObj['unreadCount'] ? parseInt(itemObj['unreadCount']) : 0) + parseInt(newData['unreadCount'])
                    }else{
                        itemObj[k]=newData[k]
                    }
                }

                found = 1
            }
        })
        if(found == 0){
            oldData.push(newData)
        }
    }else{
        oldData = [newData]
    }

    const filteredData = oldData.filter((value, index, self) => {
        return self.findIndex(v =>{
            if(v.id == value.id){
                for(var k in value){
                    v[k]=value[k]
                }
            }
            return  v.id === value.id
        }) === index
    });

    await client.set(key,JSON.stringify(filteredData))
}

const reformatMessageObj = async (sessionId,msg,messageType,loadAll=null) => {
    let body
    let status = msg.status ?  (msg.status == 'READ' ? 4 : (msg.status == 'DELIVERED' ? 3 : 3)) : (msg.message.status ? msg.message.status : 2)
    let deviceType =  getDevice(msg.key.id)
    let time = msg.messageTimestamp
    if(msg.messageTimestamp && msg.messageTimestamp.low){
        time= msg.messageTimestamp.low
    }else if(msg.messageTimestamp && msg.messageTimestamp.low === undefined){
        time= msg.messageTimestamp
    }else if(msg.time !== undefined && msg.time.low !== undefined){
        time= msg.time.low
    }else if(msg.body.contextInfo !== undefined && msg.body.contextInfo.ephemeralSettingTimestamp !== undefined && msg.body.contextInfo.ephemeralSettingTimestamp.low !== undefined){
        time= msg.body.contextInfo.ephemeralSettingTimestamp.low
    }


    let messageObj = {
        id : msg.key.id,
        body: body,
        caption: '',
        messageType: '',
        fileName: '',
        fromMe: msg.key.fromMe,
        author: msg.key.fromMe == 1 ? "Me" : reformatPhone(msg.key.remoteJid,msg.participant),
        chatName: reformatPhone(msg.key.remoteJid),
        pushName: msg.pushName ? msg.pushName : (msg.key.fromMe == 1 ? "Me" : ""),
        time: time,
        timeFormatted: new Date(time * 1000).toUTCString() ,
        status: status == 'DELIVERY_ACK' ? 3 : status,
        statusText: formatStatusText(status),
        deviceSentFrom: deviceType,
    }

    // if( messageType != 'senderKeyDistributionMessage' || messageType != 'protocolMessage'){

    let mediaMsgsType = ['imageMessage','documentMessage','videoMessage','audioMessage','stickerMessage']
    let dataObj = {}
    let messageTypeText = ''
    let fileName = ''
    if(mediaMsgsType.includes(messageType)){
        if(messageType === 'imageMessage') {
            messageTypeText = 'image'
            dataObj = msg.message.imageMessage
            fileName = msg.message.imageMessage.fileName
            messageObj.caption = msg.message.imageMessage.caption
        }else if (messageType === 'documentMessage') {
            messageTypeText = 'document'
            dataObj = msg.message.documentMessage
            fileName = msg.message.documentMessage.fileName
            messageObj.caption = msg.message.documentMessage.fileName
        }else if (messageType === 'videoMessage') {
            messageTypeText = 'video'
            dataObj = msg.message.videoMessage
            fileName = msg.message.videoMessage.fileName
            messageObj.caption = msg.message.videoMessage.caption
        }else if (messageType === 'audioMessage') {
            messageTypeText = 'audio'
            dataObj = msg.message.audioMessage
            fileName = msg.message.audioMessage.fileName
        }else if (messageType === 'stickerMessage') {
            messageTypeText = 'sticker'
            dataObj = msg.message.stickerMessage
            fileName = msg.message.stickerMessage.fileName
        }


        let extension = mime.extension(dataObj.mimetype);
        let path = './../../public/uploads/messages/'+msg.key.id+'.'+extension
        if (!existsSync(path)) {
            // download stream
            // if(loadAll != 'loadAll'){
                try {
                    const stream = await downloadContentFromMessage(dataObj, messageTypeText)
                    let buffer = Buffer.from([])
                    for await(const chunk of stream) {
                        buffer = Buffer.concat([buffer, chunk])
                    }
                    // save to file
                    await writeFileSync(path, buffer)
                } catch {
                    return null
                }
            // }

        }

        messageObj.body = process.env.IMAGE_URL+'/uploads/messages/'+msg.key.id+'.'+extension
        messageObj.fileName = fileName
        messageObj.messageType = extension == 'gif' ? 'gifMessage' : messageTypeText
        if(msg.messageTimestamp && !msg.messageTimestamp.low){
            messageObj.time =  msg.messageTimestamp
        }else if(msg.messageTimestamp && msg.messageTimestamp.low){
            messageObj.time = msg.messageTimestamp.low
        }
    }

    if(messageType == 'ephemeralMessage'){
        messageObj.body =  msg.message.extendedTextMessage && msg.message.extendedTextMessage.text ? msg.message.extendedTextMessage.text : (msg.message.ephemeralMessage.message.extendedTextMessage && msg.message.ephemeralMessage.message.extendedTextMessage.text ? msg.message.ephemeralMessage.message.extendedTextMessage.text : '')
        if(msg.message.ephemeralMessage.message.extendedTextMessage && msg.message.ephemeralMessage.message.extendedTextMessage.contextInfo){
            messageObj.expiration = msg.message.ephemeralMessage.message.extendedTextMessage.contextInfo.expiration + msg.messageTimestamp.low
            messageObj.expirationFormatted= new Date(messageObj.expiration * 1000).toUTCString()
            messageObj.messageType = 'disappearingMessage'
        }

    }else if(messageType == 'conversation'){
        messageObj.body = msg.message.conversation
        messageObj.messageType = 'text'
    }else if(messageType == 'locationMessage'){
        messageObj.messageType = 'locationMessage'
        messageObj.body = {
            latitude: msg.message.locationMessage.degreesLatitude,
            longitude: msg.message.locationMessage.degreesLongitude
        }
    }else if(messageType == 'contactMessage'){
        messageObj.messageType = 'contactMessage'
        let dataArr = msg.message.contactMessage.vcard
        let name = dataArr.split("FN:");
        if(name[1]){
            name = name[1].split("\n")[0]
        }

        let org = dataArr.split("ORG:");
        if(org[1]){
            org = org[1].split("\n")[0].replace(';','')
        }

        let phone = dataArr.split("waid=")
        if(phone[1]){
            phone = phone[1].split("\n")[0].split(':')[0]
        }

        messageObj.body = {
            name: name,
            phone: phone,
            organization: org,
        }
    }else if(messageType == 'reactionMessage'){
        messageObj.messageType = 'reactionMessage'
        // let selected = await getMessageById(sessionId,msg.message.reactionMessage.key.remoteJid,msg.message.reactionMessage.key.id)
        messageObj.body = {
            reaction: msg.message.reactionMessage.text,
            message: msg.message.reactionMessage.key
        }
    }else if(messageType == 'extendedTextMessage'){
        messageTypeText = msg.message.extendedTextMessage.contextInfo != null && msg.message.extendedTextMessage.contextInfo.isForwarded != null ? 'forwardMessage' : 'text'
        messageObj.body = messageTypeText == 'text' ? msg.message.extendedTextMessage.text : msg.message.extendedTextMessage
        messageObj.messageType = messageTypeText

        if(messageObj.body.contextInfo && messageObj.body.contextInfo.mentionedJid && messageObj.body.contextInfo.mentionedJid.length > 0){
            messageObj.messageType = 'mentionMessage'
            messageObj.body.mentions = messageObj.body.contextInfo.mentionedJid
            delete messageObj.body.contextInfo
        }

        if(messageObj.body.contextInfo && messageObj.body.contextInfo.quotedMessage){
            messageTypeText = 'replyMessage'
            let quotedMessageType = Object.keys (messageObj.body.contextInfo.quotedMessage)[0]
            let oldMsgObj = messageObj.body.contextInfo.quotedMessage
            let newMsgObj = {
                key:{
                    remoteJid: messageObj.body.contextInfo.participant,
                    id:messageObj.body.contextInfo.stanzaId,
                },
                message:messageObj.body.contextInfo.quotedMessage
            }
            delete messageObj.body.contextInfo
            messageObj.messageType = messageTypeText
            messageObj.body.quotedMessage =  newMsgObj.key//await reformatMessageObj(newMsgObj,quotedMessageType)
        }
    }else if(messageType == 'buttonsMessage'){
        messageObj.messageType = 'buttonsMessage'
        messageObj.body = {
            title: '',
            content: msg.message.buttonsMessage.contentText,
            footer: msg.message.buttonsMessage.footerText,
            buttons: formatButtonsResponse(msg.message.buttonsMessage.buttons),
            hasPreview: 0,
            image: '',
        }
        if(msg.message.buttonsMessage.headerType == 4){
            let extension = mime.extension(msg.message.buttonsMessage.imageMessage.mimetype);
            let path = './../../public/uploads/messages/'+msg.key.id+'.'+extension
            if (!existsSync(path)) {
                // download stream
                const downStream = await downloadContentFromMessage(msg.message.buttonsMessage.imageMessage, 'image')
                let downBuffer = Buffer.from([])
                for await(const oneChunk of downStream) {
                    downBuffer = Buffer.concat([downBuffer, oneChunk])
                }
                // save to file
                await writeFile(path, downBuffer)
            }
            messageObj.body.hasPreview = 1
            messageObj.body.image = process.env.IMAGE_URL+'/uploads/messages/'+msg.key.id+'.'+extension
        }

        if(messageObj.body.hasPreview == 0){
            let btnData = msg.message.buttonsMessage.contentText.split(" \r\n \r\n ");
            messageObj.body.title = btnData[0]
            messageObj.body.content = btnData[1]
        }
    }else if(messageType == 'templateMessage'){
        messageObj.messageType = 'templateMessage'
        messageObj.body = {
            title: '',
            content: msg.message.templateMessage.hydratedTemplate && msg.message.templateMessage.hydratedTemplate.hydratedContentText ? msg.message.templateMessage.hydratedTemplate.hydratedContentText : '',
            footer: msg.message.templateMessage.hydratedTemplate &&  msg.message.templateMessage.hydratedTemplate.hydratedFooterText ? msg.message.templateMessage.hydratedTemplate.hydratedFooterText : '',
            buttons: formatTemplateButtonsResponse(msg.message.templateMessage.hydratedTemplate && msg.message.templateMessage.hydratedTemplate.hydratedButtons ? msg.message.templateMessage.hydratedTemplate.hydratedButtons : []),
            hasPreview: 0,
            image: '',
        }
        if(msg.message.templateMessage.hydratedTemplate && msg.message.templateMessage.hydratedTemplate.imageMessage){
            let extension = mime.extension(msg.message.templateMessage.hydratedTemplate.imageMessage.mimetype);
            let path = './../../public/uploads/messages/'+msg.key.id+'.'+extension
            if (!existsSync(path)) {
                // download stream
                const downStream = await downloadContentFromMessage(msg.message.templateMessage.hydratedTemplate.imageMessage, 'image')
                let downBuffer = Buffer.from([])
                for await(const oneChunk of downStream) {
                    downBuffer = Buffer.concat([downBuffer, oneChunk])
                }
                // save to file
                await writeFile(path, downBuffer)
            }
            messageObj.body.hasPreview = 1
            messageObj.body.image = process.env.IMAGE_URL+'/uploads/messages/'+msg.key.id+'.'+extension
        }
        if(messageObj.body.hasPreview == 0){
            let btnData = msg.message.templateMessage.hydratedTemplate && msg.message.templateMessage.hydratedTemplate.hydratedContentText ? msg.message.templateMessage.hydratedTemplate.hydratedContentText.split(" \r\n \r\n ") : [];
            messageObj.body.title = btnData[0]
            messageObj.body.content = btnData[1]
        }
    }else if(messageType == 'listMessage'){
        messageObj.messageType = 'listMessage'
        messageObj.body = {
            title: msg.message.listMessage.title,
            footer: msg.message.listMessage.footerText,
            buttonText: msg.message.listMessage.buttonText,
            description: msg.message.listMessage.description,
            sections: formatSectionsResponse(msg.message.listMessage.sections),
        }
    }else if(msg.message && msg.message.buttonsResponseMessage){
        messageObj.messageType = 'buttons_response'
        messageObj.body = {
            selectedButtonID: msg.message.buttonsResponseMessage.selectedButtonId,
            selectedButtonText: msg.message.buttonsResponseMessage.selectedDisplayText,
            quotedMsgId: msg.message.buttonsResponseMessage.contextInfo.stanzaId,
            quotedChatId: msg.key.remoteJid,
            // quotedMsgBody: msg.message.buttonsResponseMessage.contextInfo.quotedMessage.buttonsMessage ? msg.message.buttonsResponseMessage.contextInfo.quotedMessage.buttonsMessage.contentText : '',
            type: msg.message.buttonsResponseMessage.type,
        }
    }

    if(messageObj.body && messageObj.body.text){
        messageObj.body = messageObj.body.text;
        messageObj.messageType = 'chat'
    }
    return messageObj
}

const getMessageById = async (session,remoteJid,messageId) => {
    try {
        let allMessages
        if (session.isLegacy) {
            allMessages = await session.fetchMessagesFromWA(remoteJid)
        } else {
            allMessages = await session.store.loadMessages(remoteJid)
        }

        let selected = allMessages.filter((message) => {
            return message.key.id === messageId
        })
        return selected[0]
    } catch (e){
        console.log('afafafaf',e.message);
        //return Promise.reject(null)
    }
}

/**
 * @returns {(import('@adiwajshing/baileys').AnyWASocket|null)}
 */
const getSession = (sessionId) => {
    return sessions.get(sessionId) ?? null
}

const deleteSession = (sessionId, isLegacy = false, clearInstance = false) => {
    const sessionFile = (isLegacy ? 'legacy_' : 'md_') + sessionId
    const storeFile = `${sessionId}_store`

    if (isSessionFileExists(sessionFile)) {
        unlinkSync(sessionsDir(sessionFile))
    }

    if (isSessionFileExists(storeFile) && clearInstance) {
        writeFile('./sessions/'+storeFile+'.json', '', function(){})
        writeFile('./sessions/'+storeFile+'.json', JSON.stringify({
            "chats" : [],
            "contacts" : [],
            "messages" : [],
        }), function(){console.log('done')})
        // unlinkSync(sessionsDir(storeFile))
    }

    sessions.delete(sessionId)
    retries.delete(sessionId)


}

const getChatList = (sessionId, isGroup = false) => {
    const filter = isGroup ? '@g.us' : '@s.whatsapp.net'

    return getSession(sessionId).store.chats.filter((chat) => {
        return chat.id.endsWith(filter)
    })
}

/**
 * @param {import('@adiwajshing/baileys').AnyWASocket} session
 */
const isExists = async (session, jid, isGroup = false) => {
    try {
        let result

        if (isGroup) {
            result = await session.groupMetadata(jid)

            return Boolean(result.id)
        }

        if (session.isLegacy) {
            result = await session.onWhatsApp(jid)
        } else {
            ;[result] = await session.onWhatsApp(jid)
        }

        return result.exists
    } catch {
        return false
    }
}

/**
 * @param {import('@adiwajshing/baileys').AnyWASocket} session
 */
const sendMessage = async (session, receiver, message) => {
    try {
        await delay(1000)

        return session.sendMessage(receiver, message)
    } catch {
        return Promise.reject(null) // eslint-disable-line prefer-promise-reject-errors
    }
}

/**
 * @param {import('@adiwajshing/baileys').AnyWASocket} session
 */
const sendDisappearingMessage = async (session, receiver, message) => {
    try {
        await delay(1000)

        return session.sendMessage(receiver, message, { ephemeralExpiration: WA_DEFAULT_EPHEMERAL })
    } catch {
        return Promise.reject(null) // eslint-disable-line prefer-promise-reject-errors
    }
}

const formatPhone = (phone) => {
    if (phone.endsWith('@s.whatsapp.net')) {
        return phone
    }

    let formatted = phone.replace(/\D/g, '')

    return (formatted += '@s.whatsapp.net')
}

const reformatPhone = (phone,checkGroup=null) => {
    if (phone.endsWith('@s.whatsapp.net')) {
        return phone.replace('@s.whatsapp.net','')
    }else{
        if(checkGroup){
            return reformatPhone(checkGroup)
        }else{
            return phone
        }
    }
}

const formatStatusText = (status) => {
    let text = ''
    if(status == 1){
        text = 'Pending'
    }else if(status == 2){
        text = 'Sent'
    }else if(status == 3 || status == 'DELIVERED' || status == 'DELIVERY_ACK'){
        text = 'Delivered'
    }else if(status == 4 || status == 'READ'){
        text = 'Viewed'
    }
    return text
}

const formatButtons = (buttons) => {
    return buttons.map((btn) => {
        return {
            buttonId: 'id' + btn.id,
            buttonText: {
                displayText: btn.title,
            },
            type: 1,
        }
    })
}

const formatSectionsResponse = (sections) => {
    return sections.map((section) => {
        return {
            title: section.title,
            rows: section.rows.map((row) => {
                return {
                    id: row.rowId,
                    title: row.title,
                    description: row.description,
                }
            })
        }
    })
}

const formatButtonsResponse = (buttons) => {
    return buttons.map((btn) => {
        return {
            id: btn.buttonId,
            title: btn.buttonText.displayText,
            type: 1,
        }
    })
}


const formatTemplateButtons = (buttons) => {
    return buttons.map((btn) => {
        const button = {
            index: btn.id,
        }

        if (btn.type === 1) {
            button.urlButton = {
                displayText: btn.title,
                url: btn.extra_data,
            }
        } else if (btn.type === 2) {
            button.callButton = {
                displayText: btn.title,
                phoneNumber: btn.extra_data,
            }
        } else if (btn.type === 3) {
            button.quickReplyButton = {
                displayText: btn.title,
                id: btn.extra_data,
            }
        }

        return button
    })
}

const formatTemplateButtonsResponse = (buttons) => {
    return buttons.map((btn) => {
        const button = {
            index: btn.index,
        }

        if (Object.keys(btn)[1] === 'urlButton') {
            button.urlButton = {
                title: btn.urlButton.displayText,
                url: btn.urlButton.url,
            }
        } else if (Object.keys(btn)[1] === 'callButton') {
            button.callButton = {
                title: btn.callButton.displayText,
                phone: btn.callButton.phoneNumber,
            }
        } else if (Object.keys(btn)[1] === 'quickReplyButton') {
            button.normalButton = {
                title: btn.quickReplyButton.displayText,
                id: btn.quickReplyButton.id,
            }
        }

        return button
    })
}

const formatGroup = (group) => {
    if (group.endsWith('@g.us')) {
        return group
    }

    let formatted = group.replace(/[^\d-]/g, '')

    return (formatted += '@g.us')
}

const cleanup = () => {
    // console.log('Running cleanup before exit.')
    sessions.forEach((session, sessionId) => {
        if (!session.isLegacy) {
            session.store.writeToFile(sessionsDir(`${sessionId}_store`))
        }
    })
}

const init = () => {
    readdir(sessionsDir(), (err, files) => {
        if (err) {
            throw err
        }

        for (const file of files) {
            if (
                !file.endsWith('.json') ||
                (!file.startsWith('md_') && !file.startsWith('legacy_')) ||
                file.includes('_store')
            ) {
                continue
            }

            const filename = file.replace('.json', '')
            const isLegacy = filename.split('_', 1)[0] !== 'md'
            const sessionId = filename.substring(isLegacy ? 7 : 3)

            createSession(sessionId, isLegacy)
        }
    })
}

const onWhatsApp = async (session, id) => {
    try {
        await delay(1000)

        return session.onWhatsApp(id)
    } catch {
        return Promise.reject(null) // eslint-disable-line prefer-promise-reject-errors
    }
}


/**
 * @param {import('@adiwajshing/baileys').AnyWASocket} session
 */
const getLastMessageInChat = async (session, id) => {
    let messages

    try {
        if (session.isLegacy) {
            messages = await session.fetchMessagesFromWA(id, 1, null)
        } else {
            messages = await session.store.loadMessages(id, 1, null)
        }

        if (Array.isArray(messages) && messages.length > 0) {
            return messages[0]
        }

        return Promise.reject(null) // eslint-disable-line prefer-promise-reject-errors
    } catch {
        return Promise.reject(null) // eslint-disable-line prefer-promise-reject-errors
    }
}

const getConversationMessage = async (sessionId, id) => {
    let messages
    const session  = await getSession(sessionId)
    try {
        if (session.isLegacy) {
            messages = await session.fetchMessagesFromWA(id)
        } else {
            messages = await session.store.loadMessages(id)
        }
        if (Array.isArray(messages) && messages.length > 0) {
            return messages
        }
    } catch {
        return Promise.reject(null) // eslint-disable-line prefer-promise-reject-errors
    }
}

/**
 * @param {import('@adiwajshing/baileys').AnyWASocket} session
 */
const getProductById = async (session, id, productId) => {
    try {
        const response = await session.getCatalog(id)

        if (Array.isArray(response.products) && response.products.length > 0) {
            return response.products.find((item) => {
                return item.id === productId
            })
        }

        return Promise.reject(null) // eslint-disable-line prefer-promise-reject-errors
    } catch {
        return Promise.reject(null) // eslint-disable-line prefer-promise-reject-errors
    }
}



export {
    isSessionExists,
    createSession,
    getSession,
    deleteSession,
    getChatList,
    isExists,
    sendMessage,
    sendDisappearingMessage,
    formatPhone,
    formatButtons,
    formatTemplateButtons,
    formatGroup,
    cleanup,
    init,
    onWhatsApp,
    getMessageById,
    getLastMessageInChat,
    getConversationMessage,
    getProductById,
    reformatPhone,
    reformatMessageObj,
    formatButtonsResponse,
    formatTemplateButtonsResponse,
    formatSectionsResponse,
    formatStatusText,
    processRedisData,
    sleep
}