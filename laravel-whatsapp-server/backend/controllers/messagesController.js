import {
    getSession,
    getChatList,
    isExists,
    sendMessage,
    sendDisappearingMessage,
    formatPhone,
    formatGroup,
    formatButtons,
    formatTemplateButtons,
    onWhatsApp,
    getMessageById,
    reformatMessageObj,
    getConversationMessage,
    formatStatusText,
    processRedisData,
    sleep
} from './../whatsapp.js'
import response from '../response.js'
import { mimeType, fileName } from '../utils.js'
import {readdirSync,readFileSync} from "fs"
import { createClient } from 'redis';


const fetchDialogs = async (req , res) => {
    const sessionId = req.query.id ?? req.params.id
    try {
       
        const selected = await getChatList(sessionId)

        if (!selected) {
            return response(res, 400, false, 'This Channel does not exist.')
        }

        const redisClient = createClient('127.0.0.1','6379');
        redisClient.on('error', (err) => console.log('Redis Client Error', err));
        await redisClient.connect();

        let dialogs = Object.values(selected.dict);

        let key = sessionId+"_conversations"
        let oldData = await redisClient.get(key);
        oldData = oldData.toString()
        if(oldData != 'null' && oldData != null && oldData != ''){
            oldData = JSON.parse(oldData)
            oldData = oldData.concat(dialogs)
        }else{
            oldData = dialogs
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
        await redisClient.set(key,JSON.stringify(filteredData))

        response(res, 200, true, 'Dialogs Found !!!' ,selected)
    } catch {
        response(res, 500, false, 'Failed to load the message.')
    }
}

const fetchMessages = async (req , res) => {
    const sessionId = req.query.id ?? req.params.id
    try {
        let messagesData = [];
        let messagesArr = []

        const dialogs = await getChatList(sessionId)
        let fixedDialogs = Object.values(dialogs.dict)

        const convMessages = await Promise.all(Object.values(dialogs.dict).map(async (item) => {
            let dataObj = await getConversationMessage(sessionId,item.id)
            return messagesData.push(dataObj)
        }));
       
        const detailedMessages = await Promise.all(Object.values(messagesData).map(async (item) => {
            if(item){
                item.forEach(async function(msg){
                    let messageObj = {
                        key: msg.key,
                        time: msg.messageTimestamp,
                        pushName: msg.pushName,
                        status: msg.status,
                        statusText: formatStatusText(msg.status)
                    }
                    
                    try{
                        let messageData = await reformatMessageObj(sessionId,msg,Object.keys (msg.message)[0],'loadAll')
                        messageObj.message = messageData;
                        messagesArr.push(messageData)
                    }catch{}
                });
            }
        }));


        const redisClient = createClient('127.0.0.1','6379');
        redisClient.on('error', (err) => console.log('Redis Client Error', err));
        await redisClient.connect();

        let key = sessionId+"_messages"
        let oldData = await redisClient.get(key);
        oldData = oldData.toString()
        if(oldData != 'null' && oldData != null && oldData != ''){
            oldData = JSON.parse(oldData)
            oldData = oldData.concat(messagesArr)
        }else{
            oldData = messagesArr
        }

        const filteredData = oldData.filter((value, index, self) => {
            return self.findIndex(v =>{
                if(v && value){
                    if(v.id == value.id){
                        for(var k in value){
                            v[k]=value[k]
                        } 
                    }
                    return  v.id === value.id
                }
            }) === index 
        });
        await redisClient.set(key,JSON.stringify(filteredData))

        response(res, 200, true, 'Messages Found !!!' ,filteredData)
        
    } catch {
        response(res, 500, false, 'Failed to load the message.')
    }

}

const getList = (req, res) => {
    return response(res, 200, true, '', getChatList(res.locals.sessionId))
}

const findMessage = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const messageId = req.body.messageId

    try {
        const exists = await isExists(session, phone,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const selected = await getMessageById(session,phone, messageId)

        if (!selected) {
            return response(res, 400, false, 'This message does not exist.')
        }

        // const msgObj = await reformatMessageObj(res.locals.sessionId,selected, Object.keys (selected.message)[0])

        response(res, 200, true, 'Message Found !!!' ,selected)
    } catch {
        response(res, 500, false, 'Failed to load the message.')
    }
}

const send = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const message = req.body.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendMessage(session, target, { text: message })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendDisappearing = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const message = req.body.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendDisappearingMessage(session, target, { text: message })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendTemplates = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { hasImage } = req.body
    const templateButtons = formatTemplateButtons(req.body.buttons)

    const buttonMessage = {
        text: req.body.body,
        footer: req.body.footer,
        templateButtons,
    }

    if (hasImage) {
        delete buttonMessage.text
        buttonMessage.image = {
            url: req.body.imageURL,
        }
        buttonMessage.caption = req.body.body
        buttonMessage.headerType = 4
    }

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendMessage(session, target, buttonMessage)

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendListMessage = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { sections } = req.body

    const buttonMessage = {
        text: req.body.body,
        footer: req.body.footer,
        title: req.body.title,
        buttonText: req.body.buttonText,
        sections,
    }

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendMessage(session, target, buttonMessage)

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendReaction = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    let bodyText = ''

    if(req.body.body == 1){
        bodyText = '👍'
    }else if(req.body.body == 2){
        bodyText = '❤️'
    }else if(req.body.body == 3){
        bodyText = '😂'
    }else if(req.body.body == 4){
        bodyText = '😮'
    }else if(req.body.body == 5){
        bodyText = '😢'
    }else if(req.body.body == 6){
        bodyText = '🙏'
    }

    const buttonMessage = {
        react: {
            text: bodyText,
            key: req.body.messageId,
        },
    }

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendMessage(session, target, buttonMessage)

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendReply = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const message = req.body.body
    const { quoted } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendMessage(session, target, { text: message }, { quoted })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendMention = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { mention } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendMessage(session, target, {
            text: '@' + mention,
            mentions: [mention + '@s.whatsapp.net'],
        })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendBulk = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const errors = []

    for (const [key, data] of req.body.entries()) {
        const target = data.phone ? formatPhone(data.phone) : formatGroup(data.chat)
        if (!target || !data.message) {
            errors.push(key)

            continue
        }

        try {
            const exists = await isExists(session, target,(! req.body.phone ? true : false ))

            if (!exists) {
                errors.push(key)

                continue
            }

            await sendMessage(session, target, { text: data.message })
        } catch {
            errors.push(key)
        }
    }

    if (errors.length === 0) {
        return response(res, 200, true, 'All messages has been successfully sent.')
    }

    const isAllFailed = errors.length === req.body.length

    response(
        res,
        isAllFailed ? 500 : 200,
        !isAllFailed,
        isAllFailed ? 'Failed to send all messages.' : 'Some messages has been successfully sent.',
        { errors }
    )
}
/*********************************************************/
const sendButtons = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { hasImage } = req.body
    const buttons = formatButtons(req.body.buttons)

    const buttonMessage = {
        text: req.body.body,
        footer: req.body.footer,
        buttons,
        headerType: 1,
    }

    if (hasImage) {
        delete buttonMessage.text
        buttonMessage.image = {
            url: req.body.imageURL,
        }
        buttonMessage.caption = req.body.body
        buttonMessage.headerType = 4
    }

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendMessage(session, target, buttonMessage)

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendLocation = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { lat, lng } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendMessage(session, target, {
            location: { degreesLatitude: lat, degreesLongitude: lng },
        })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendContact = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { name, contact, organization } = req.body

    const vcard =
        'BEGIN:VCARD\n' + // Metadata of the contact card
        'VERSION:3.0\n' +
        'FN:' +
        name +
        '\n' + // Full name
        'ORG:' +
        organization +
        ';\n' + // The organization of the contact
        'TEL;type=CELL;type=VOICE;waid=' +
        contact +
        ':+' +
        contact +
        '\n' + // WhatsApp ID + phone number
        'END:VCARD'

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await sendMessage(session, target, { contacts: { displayName: name, contacts: [{ vcard }] } })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendAudio = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { url } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await session.sendMessage(target, {
            audio: { url },
        })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendVideo = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { url, caption } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await session.sendMessage(target, {
            video: { url },
            caption: caption ? caption : '',
            mimetype: mimeType(url),
            gifPlayback: mimeType(url) === 'image/gif',
        })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendFile = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { url } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await session.sendMessage(target, {
            document: { url },
            mimetype: mimeType(url),
            fileName: fileName(url),
        })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendImage = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { url, caption } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await session.sendMessage(target, {
            image: { url },
            mimetype: mimeType(url),
            caption,
        })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}
/*********************************************************/

const checkPhone = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const receiver = formatPhone(req.body.receiver)

    try {
        const exists = await isExists(session, receiver)

        if (!exists) {
            return response(res, 400, false, 'The receiver number is not exists.')
        }

        const result = await onWhatsApp(session, receiver)

        response(res, 200, true, 'TThe receiver number exists.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const forwardMessage = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { msg } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'this chat does not exist.')
        }

        const result = await sendMessage(session, target, { forward: msg })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const deleteMessage = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { messageKey } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'this chat does not exist.')
        }

        const selected = await getMessageById(session,target, messageKey)
        const obj = await session.sendMessage(target, { delete: selected.key })

        response(res, 200, true, '', obj)
    } catch {
        response(res, 500, false, 'Failed to delete message.')
    }
}

const deleteMessageForMe = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { messageKey } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'this chat does not exist.')
        }

        const status = await session.chatModify({ clear: { message: { id: messageKey, fromMe: true } } }, target, [])
        response(res, 200, true, '', status)
    } catch {
        response(res, 500, false, 'Failed to delete message.')
    }
}

const sendPTT = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { url } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await session.sendMessage(target, {
            audio: { url },
            ptt: true,
        })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendStiker = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { url } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await session.sendMessage(target, {
            sticker: { url },
            mimetype: mimeType(url),
        })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const sendGif = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { url, caption } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const result = await session.sendMessage(target, {
            video: { url },
            caption: caption ? caption : '',
            mimetype: mimeType(url),
            gifPlayback: true,
        })

        response(res, 200, true, 'The message has been successfully sent.', result)
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

export {
    getList,
    send,
    sendDisappearing,
    sendButtons,
    sendTemplates,
    sendListMessage,
    sendReaction,
    sendReply,
    sendMention,
    sendLocation,
    sendContact,
    sendBulk,
    forwardMessage,
    checkPhone,
    deleteMessage,
    deleteMessageForMe,
    sendAudio,
    sendPTT,
    sendVideo,
    sendFile,
    sendImage,
    sendStiker,
    sendGif,
    findMessage,
    fetchDialogs,
    fetchMessages
}
