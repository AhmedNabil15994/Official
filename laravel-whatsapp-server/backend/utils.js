import { parse } from 'url'
import { lookup } from 'mime-types'
import { existsSync, unlinkSync, readdir ,appendFileSync,readFileSync,writeFileSync } from 'fs'
import { writeFile,readFile } from 'fs/promises'
import {formatStatusText} from './whatsapp.js'
import needle from 'needle';

const mimeType = (url) => {
    const pathObj = parse(url, true)
    const mimeType = lookup(pathObj.pathname)

    return mimeType
}

const fileName = (url) => {
    const pathObj = parse(url, true)
    const fileName = pathObj.pathname.split('/').pop()

    return fileName
}

function sleep(ms) {
  return new Promise((resolve) => {
    setTimeout(resolve, ms);
  });
}

const addDataToFile = async (sessionId,appendData,type) => {
    // const filePath = './../../storage/logs/pm2s/'+sessionId+'.json';
    // const filePath2 = './../../storage/logs/pm2s/'+sessionId+'-2.json';
    // console.log(appendData)
    if(appendData != null){
        // if(!existsSync(filePath2)){
        //     await writeFileSync(filePath2, JSON.stringify({chats:[]}), function(){});
        // }
        // new incoming message
        if(type == 'incomingMessage' && appendData.message.body !== undefined){
            const filePath = './../../storage/logs/pm2s/'+sessionId+'/bots.json';
            if(!existsSync(filePath)){
                await writeFile(filePath, JSON.stringify({messages:[]}), function(){sleep(10000)});
            }
            let fileData = await readFileSync(filePath, 'utf-8');
            if(fileData == 'null' || fileData == null || fileData == ''){
                fileData = {}
            }else{
                fileData = JSON.parse(fileData.toString())
            }
            let newFileData = fileData;
            let appendDataPlus = appendData;
            if(appendData.key.fromMe == true){
                appendDataPlus = {
                    key:  appendData.key,
                    message:  appendData.message,
                    messageTimestamp:  appendData.messageTimestamp,
                    status:  appendData.status,
                }

                if(newFileData && newFileData.messages){
                    newFileData.messages.push([appendDataPlus]);
                }else if(newFileData){
                    newFileData['messages'] = []
                    newFileData.messages.push([appendDataPlus]);
                }
                await writeFile(filePath, JSON.stringify(newFileData), function(){sleep(10000)})   
            }
            
        }else if(type == 'chatUpdated' && (('pin' in appendData) || ('archive' in appendData))){
            // new Dialog status update
            const filePath2 = './../../storage/logs/pm2s/'+sessionId+'/chats.json';
            if(!existsSync(filePath2)){
                await writeFile(filePath2, JSON.stringify({chats:[]}), function(){sleep(10000)});
            }
            let fileData = await readFileSync(filePath2, 'utf-8');
            if(fileData == 'null' || fileData == null || fileData == ''){
                fileData = {}
            }else{
                fileData = JSON.parse(fileData.toString())
            }
            let newFileData = fileData;
            
            if(newFileData && newFileData.chats){
                let found = 0;
                newFileData.chats.forEach(itemObj=>{
                    if(itemObj.id == appendData.id){
                        itemObj['pinned'] = appendData.pin === undefined ? 0 : appendData.pin
                        itemObj['archived'] = appendData.archive === undefined ? 0 : appendData.archive
                        itemObj['unreadCount'] = appendData.unreadCount === undefined ? 0 : appendData.unreadCount
                        found = 1;
                    }
                });

                if(found == 0){
                    newFileData.chats.push({
                        id:appendData.id,
                        last_time: appendData.conversationTimestamp,
                        pinned:appendData.pin === undefined ? 0 : appendData.pin,
                        archived:appendData.archive === undefined ? 0 : appendData.archive,
                        unreadCount:appendData.unreadCount === undefined ? 0 : appendData.unreadCount,
                    });
                }
            }else{
                newFileData['chats'] = []
                newFileData.chats.push({
                    id:appendData.id,
                    last_time: appendData.conversationTimestamp,
                    pinned:appendData.pin === undefined ? 0 : appendData.pin,
                    archived:appendData.archive === undefined ? 0 : appendData.archive,
                    unreadCount:appendData.unreadCount === undefined ? 0 : appendData.unreadCount,
                });
            }
            await writeFile(filePath2, JSON.stringify(newFileData), function(){sleep(10000)})   
        }
        // else if(type == 'messageStatus'){
        //     // new message status
        //     let fileData = await readFileSync(filePath, 'utf-8');
        //     if(fileData == 'null' || fileData == null || fileData == ''){
        //         fileData = {}
        //     }else{
        //         fileData = JSON.parse(fileData)
        //     }

        //     let newFileData = fileData;
            
        //     if(newFileData && newFileData.messages){
        //         let found = 0;
        //         newFileData.messages.forEach(itemObj=>{
        //             if(itemObj.message && itemObj.message.id && itemObj.message.id == appendData.key.id){
        //                 itemObj.message.status = appendData.update.status
        //                 itemObj.message.statusText = formatStatusText(appendData.update.status)
        //                 found = 1;
        //             }
        //         });
        //         if(found == 0){
        //             newFileData.messages.push({
        //                 id:appendData.key.id,
        //                 fromMe:appendData.key.fromMe,
        //                 status: appendData.update.status,
        //                 chatName:appendData.key.remoteJid.replace('@s.whatsapp.net',''),
        //                 statusText: formatStatusText(appendData.update.status)
        //             });
        //         }
        //     }else{
        //         newFileData['messages'] = []
        //         newFileData.messages.push({
        //             id:appendData.key.id,
        //             fromMe:appendData.key.fromMe,
        //             status: appendData.update.status,
        //             chatName:appendData.key.remoteJid.replace('@s.whatsapp.net',''),
        //             statusText: formatStatusText(appendData.update.status)
        //         });
        //     }
        //     await writeFile(filePath, JSON.stringify(newFileData), function(){sleep(10000)})   
        // }else if(type == 'chatDeleted'){
        //     // Dialog is deleted
        //     let fileData = await readFileSync(filePath, 'utf-8');
        //     if(fileData == 'null' || fileData == null || fileData == ''){
        //         fileData = {}
        //     }else{
        //         fileData = JSON.parse(fileData)
        //     }

        //     let newFileData = fileData;
        //     if(fileData && fileData.chats){
        //         let found = 0;
        //         newFileData.chats.forEach(itemObj=>{
        //             if(itemObj.id == appendData.id){
        //                 itemObj['deleted_by'] = 1
        //                 itemObj['deleted_at'] = Math.floor(Date.now() / 1000)
        //                 found = 1;
        //             }
        //         });
        //         if(found == 0){
        //             newFileData.chats.push({
        //                 id:appendData.id,
        //                 last_time: appendData.conversationTimestamp,
        //                 deleted_by: 1,
        //                 deleted_at: Math.floor(Date.now() / 1000)
        //             });
        //         }
        //     }else{
        //         newFileData['chats'] = []
        //         newFileData.chats.push({
        //             id:appendData.id,
        //             last_time: appendData.conversationTimestamp,
        //             deleted_by: 1,
        //             deleted_at: Math.floor(Date.now() / 1000)
        //         });
        //     }
        //     await writeFile(filePath, JSON.stringify(newFileData), function(){sleep(1000)})   
        // }else if(type == 'qrRead'){
        //     await needle.get("http://"+process.env.HOST+":"+process.env.PORT+"/messages/fetchDialogs?id="+sessionId, {id:sessionId}, async function(err, resp, body){
        //         let fileData = await readFile(filePath, 'utf-8');
        //         if(fileData == 'null' || fileData == null || fileData == ''){
        //             fileData = {}
        //         }else{
        //             fileData = JSON.parse(fileData)
        //         }
        //         if(fileData && fileData.chats){
        //             fileData.chats.push(body.data)
        //         }else{
        //             fileData['chats'] = body.data
        //         }
        //         await writeFile(filePath, JSON.stringify(fileData), function(){});
            
        //         await needle.get("http://"+process.env.HOST+":"+process.env.PORT+"/messages/fetchMessages?id="+sessionId, {id:sessionId}, async function(err, resp, body){
        //             let fileData = await readFile(filePath, 'utf-8');
        //             if(fileData == 'null' || fileData == null || fileData == ''){
        //                 fileData = {}
        //             }else{
        //                 fileData = JSON.parse(fileData)
        //             }
        //             if(fileData && fileData.messages){
        //                 fileData.messages.push(body.data);
        //             }else if(fileData){
        //                 fileData['messages'] = body.data;
        //             }
        //             await writeFile(filePath, JSON.stringify(fileData), function(){})
        //         })
        //     });
        
        // }
    }
}

export { mimeType, fileName , addDataToFile,sleep }
