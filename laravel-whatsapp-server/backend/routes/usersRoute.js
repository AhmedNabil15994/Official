import { Router } from 'express'
import { body, query } from 'express-validator'
import requestValidator from './../middlewares/requestValidator.js'
import sessionValidator from './../middlewares/sessionValidator.js'
import * as controller from './../controllers/usersController.js'

const router = Router()

router.post(
    '/userStatus',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.userStatus
)

router.post(
    '/userPresence',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.userPresence
)

router.post(
    '/displayPicture',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.userDisplayPicture
)

router.post(
    '/blockUser',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.blockUser
)

router.post(
    '/unblockUser',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.unblockUser
)

router.post(
    '/userBusinessProfile',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.businessProfile
)

router.post(
    '/getProducts',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.getProducts
)

router.post(
    '/getProduct',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    body('productId').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.getProduct
)

router.post(
    '/getOrder',
    query('id').notEmpty(),
    body('orderId').notEmpty(),
    body('orderToken').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.getOrder
)

export default router
