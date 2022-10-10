import { Router } from 'express'
import { body, query } from 'express-validator'
import requestValidator from '../middlewares/requestValidator.js'
import sessionValidator from '../middlewares/sessionValidator.js'
import * as controller from '../controllers/messagesController.js'
import getMessages from '../controllers/getMessages.js'

const router = Router()

router.get('/get', query('id').notEmpty(), requestValidator, sessionValidator, controller.getList)
router.get('/fetchDialogs', query('id').notEmpty(), requestValidator, controller.fetchDialogs)
router.get('/fetchMessages', query('id').notEmpty(), requestValidator, controller.fetchMessages)
router.post('/getMessageByID', query('id').notEmpty(), body('phone'),body('messageId').notEmpty(), requestValidator, sessionValidator, controller.findMessage)

router.get('/get/:jid', query('id').notEmpty(), requestValidator, sessionValidator, getMessages)

router.post(
    '/sendMessage',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('body').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.send
)

router.post(
    '/sendDisappearingMessage',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('body').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendDisappearing
)

router.post(
    '/send-bulk',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    [],
    sessionValidator,
    controller.sendBulk
)

router.post(
    '/sendButtons',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('body').notEmpty(),
    body('footer').notEmpty(),
    body('buttons').notEmpty(),
    body('hasImage').notEmpty(),
    body('imageURL'),
    requestValidator,
    sessionValidator,
    controller.sendButtons
)
router.post(
    '/sendButtonsTemplate',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('body').notEmpty(),
    body('footer').notEmpty(),
    body('buttons').notEmpty(),
    body('hasImage').notEmpty(),
    body('imageURL'),
    requestValidator,
    sessionValidator,
    controller.sendTemplates
)

router.post(
    '/sendListMessage',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('body').notEmpty(),
    body('footer').notEmpty(),
    body('sections').notEmpty(),
    body('title').notEmpty(),
    body('buttonText').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendListMessage
)

router.post(
    '/sendReaction',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('body').notEmpty(),
    body('messageId').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendReaction
)

router.post(
    '/sendReply',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('body').notEmpty(),
    body('quoted').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendReply
)

router.post(
    '/sendMention',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('mention').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendMention
)

router.post(
    '/sendLocation',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('lat').notEmpty(),
    body('lng').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendLocation
)

router.post(
    '/sendContact',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('name').notEmpty(),
    body('contact').notEmpty(),
    body('organization'),
    requestValidator,
    sessionValidator,
    controller.sendContact
)

router.post(
    '/forwardMessage',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('msg').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.forwardMessage
)

router.post(
    '/checkPhone',
    query('id').notEmpty(),
    body('receiver').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.checkPhone
)

router.post(
    '/deleteMessage',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('messageKey').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.deleteMessage
)

router.post(
    '/deleteMessageForMe',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('messageKey').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.deleteMessageForMe
)

router.post(
    '/sendAudio',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('url').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendAudio
)

router.post(
    '/sendPTT',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('url').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendPTT
)

router.post(
    '/sendVideo',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('url').notEmpty(),
    body('caption'),
    requestValidator,
    sessionValidator,
    controller.sendVideo
)

router.post(
    '/sendFile',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('url').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendFile
)

router.post(
    '/sendImage',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('url').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendImage
)

router.post(
    '/sendStiker',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('url').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.sendStiker
)

router.post(
    '/sendGif',
    query('id').notEmpty(),
    body('phone'),
    body('chat').if(body('phone').not().exists()).notEmpty(),
    body('url').notEmpty(),
    body('caption'),
    requestValidator,
    sessionValidator,
    controller.sendGif
)

export default router
