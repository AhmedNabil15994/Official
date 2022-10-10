import {
    getSession,
    getChatList,
    isExists,
    sendMessage,
    formatPhone,
    getLastMessageInChat,
    formatGroup,
} from './../whatsapp.js'
import response from '../response.js'

const getList = (req, res) => {
    return response(res, 200, true, '', getChatList(res.locals.sessionId, true))
}

const getGroupMetaData = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const { jid } = req.params

    try {
        const data = await session.groupMetadata(jid)

        if (!data.id) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        response(res, 200, true, '', data)
    } catch {
        response(res, 500, false, 'Failed to get group metadata.')
    }
}

const send = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { message } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        await sendMessage(session, target, { text: message })

        response(res, 200, true, 'The message has been successfully sent.')
    } catch {
        response(res, 500, false, 'Failed to send the message.')
    }
}

const readChat = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const lastMsgInChat = await getLastMessageInChat(session, target)

        const status = await session.chatModify({ markRead: true, lastMessages: [lastMsgInChat] }, target)

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to read chat.')
    }
}

const unreadChat = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const lastMsgInChat = await getLastMessageInChat(session, target)

        const status = await session.chatModify({ markRead: false, lastMessages: [lastMsgInChat] }, target)

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to unread chat.')
    }
}

const archiveChat = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const lastMsgInChat = await getLastMessageInChat(session, target)

        const status = await session.chatModify({ archive: true, lastMessages: [lastMsgInChat] }, target)

        return response(res, 200, true, '', status)
    } catch (ex) {
        console.log(ex)
        return response(res, 500, false, 'Failed to archive chat.')
    }
}

const unarchiveChat = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const lastMsgInChat = await getLastMessageInChat(session, target)

        const status = await session.chatModify({ archive: false, lastMessages: [lastMsgInChat] }, target)

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to unarchive chat.')
    }
}

const muteChat = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)
    const { duration } = req.body

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.chatModify({ mute: duration }, target, [])

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to mute chat.')
    }
}

const unmuteChat = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.chatModify({ mute: null }, target, [])

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to unmute chat.')
    }
}

const pinChat = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.chatModify({ pin: true }, target, [])

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to pin chat.')
    }
}

const unpinChat = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.chatModify({ pin: false }, target, [])

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to unpin chat.')
    }
}

const chatDisplayPicture = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const image = await session.profilePictureUrl(chat, 'image')

        return response(res, 200, true, '', image)
    } catch {
        return response(res, 500, false, 'Failed to get chat display picture.')
    }
}

const setDisplayPicture = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)
    const { imageURL } = req.body

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const updated = await session.updateProfilePicture(chat, { url: imageURL })

        if (updated) {
            return response(res, 200, true, '')
        }

        return response(res, 500, false, 'Failed to set group display picture.')
    } catch {
        return response(res, 500, false, 'Failed to set group display picture.')
    }
}

const createGroup = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const { subject, phones } = req.body

    try {
        const group = await session.groupCreate(subject, phones)

        return response(res, 200, true, '', {
            id: group.id,
            gid: group.gid,
        })
    } catch {
        return response(res, 500, false, 'Failed to get chat display picture.')
    }
}

const groupSettings = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)
    const { setting } = req.body

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const group = await session.groupSettingUpdate(chat, setting)

        return response(res, 200, true, '', {
            id: group.id,
            gid: group.gid,
        })
    } catch {
        return response(res, 500, false, 'Failed to get chat display picture.')
    }
}

const renameGroup = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)
    const { subject } = req.body

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.groupUpdateSubject(chat, subject)

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to rename group.')
    }
}

const setGroupDescription = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)
    const { description } = req.body

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.groupUpdateDescription(chat, description)

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to change group description.')
    }
}

const leaveGroup = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.groupLeave(chat)

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to leave group.')
    }
}

const addGroupParticipant = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)
    const { phones } = req.body

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.groupParticipantsUpdate(chat, phones, 'add')

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to add group participants.')
    }
}

const removeGroupParticipant = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)
    const { phones } = req.body

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.groupParticipantsUpdate(chat, phones, 'remove')

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to remove group participants.')
    }
}

const promoteGroupParticipant = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)
    const { phones } = req.body

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.groupParticipantsUpdate(chat, phones, 'promote')

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to promote group participants.')
    }
}

const demoteGroupParticipant = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatGroup(req.body.chat)
    const { phones } = req.body

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.groupParticipantsUpdate(chat, phones, 'demote')

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to demote group participants.')
    }
}

const setTyping = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const updated = await session.sendPresenceUpdate(target, 'composing')

        return response(res, 200, true, '', updated)
    } catch {
        return response(res, 500, false, 'Failed to set user presence.')
    }
}

const setRecording = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const updated = await session.sendPresenceUpdate(target, 'recording')

        return response(res, 200, true, '', updated)
    } catch {
        return response(res, 500, false, 'Failed to set user presence.')
    }
}

const inviteCode = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const chat = formatPhone(req.body.chat)

    try {
        const exists = await isExists(session, chat,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const code = await session.groupInviteCode(chat)

        return response(res, 200, true, '', code)
    } catch {
        return response(res, 500, false, 'Failed to get group invitation link.')
    }
}

const joinGroup = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const { code } = req.body

    try {
        const response = await session.groupAcceptInvite(code)

        return response(res, 200, true, '', response)
    } catch {
        return response(res, 500, false, 'Failed to get group invitation link.')
    }
}

const clearChat = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const target = req.body.phone ? formatPhone(req.body.phone) : formatGroup(req.body.chat)

    try {
        const exists = await isExists(session, target,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'This chat does not exist.')
        }

        const status = await session.chatModify({ clear: 'all' }, target, [])

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to clear chat.')
    }
}

export {
    getList,
    getGroupMetaData,
    send,
    readChat,
    unreadChat,
    archiveChat,
    unarchiveChat,
    muteChat,
    unmuteChat,
    pinChat,
    unpinChat,
    chatDisplayPicture,
    setDisplayPicture,
    createGroup,
    groupSettings,
    renameGroup,
    setGroupDescription,
    leaveGroup,
    addGroupParticipant,
    removeGroupParticipant,
    promoteGroupParticipant,
    demoteGroupParticipant,
    setTyping,
    setRecording,
    inviteCode,
    joinGroup,
    clearChat,
}
