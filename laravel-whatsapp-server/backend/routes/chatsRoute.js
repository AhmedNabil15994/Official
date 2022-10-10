import { Router } from 'express'
import { body, query } from 'express-validator'
import requestValidator from './../middlewares/requestValidator.js'
import sessionValidator from './../middlewares/sessionValidator.js'
import * as controller from './../controllers/chatsController.js'
import getMessages from './../controllers/getMessages.js'

const router = Router()

router.get('/', query('id').notEmpty(), requestValidator, sessionValidator, controller.getList)

router.get('/:jid', query('id').notEmpty(), requestValidator, sessionValidator, getMessages)

router.get('/meta/:jid', query('id').notEmpty(), requestValidator, sessionValidator, controller.getGroupMetaData)

router.post(
    '/sendMessage',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('message').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.send
)

router.post(
    '/readChat',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.readChat
)

router.post(
    '/unreadChat',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.unreadChat
)

router.post(
    '/archiveChat',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.archiveChat
)

router.post(
    '/unarchiveChat',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.unarchiveChat
)

router.post(
    '/muteChat',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('duration').isInt().notEmpty(),
    requestValidator,
    sessionValidator,
    controller.muteChat
)

router.post(
    '/unmuteChat',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.unmuteChat
)

router.post(
    '/pinChat',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.pinChat
)

router.post(
    '/unpinChat',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.unpinChat
)

router.post(
    '/displayPicture',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.chatDisplayPicture
)

router.post(
    '/setDisplayPicture',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    body('imageURL').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.setDisplayPicture
)

router.post(
    '/group',
    query('id').notEmpty(),
    body('subject').notEmpty(),
    body('phones').isArray({ min: 1 }).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.createGroup
)

router.post(
    '/groupSettings',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    body('settings').isIn(['announcement', 'not_announcement', 'locked', 'unlocked']).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.groupSettings
)

router.post(
    '/renameGroup',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    body('subject').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.renameGroup
)

router.post(
    '/setGroupDescription',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    body('description').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.setGroupDescription
)

router.post(
    '/leaveGroup',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    body('description').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.leaveGroup
)

router.post(
    '/addGroupParticipant',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    body('phones').isArray({ min: 1 }).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.addGroupParticipant
)

router.post(
    '/removeGroupParticipant',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    body('phones').isArray({ min: 1 }).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.removeGroupParticipant
)

router.post(
    '/promoteGroupParticipant',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    body('phones').isArray({ min: 1 }).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.promoteGroupParticipant
)

router.post(
    '/demoteGroupParticipant',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    body('phones').isArray({ min: 1 }).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.demoteGroupParticipant
)

router.post(
    '/typing',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.setTyping
)

router.post(
    '/recording',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.setRecording
)

router.post(
    '/inviteCode',
    query('id').notEmpty(),
    body('chat').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.inviteCode
)

router.post(
    '/joinGroup',
    query('id').notEmpty(),
    body('code').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.joinGroup
)

router.post(
    '/clearChat',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.clearChat
)

export default router
