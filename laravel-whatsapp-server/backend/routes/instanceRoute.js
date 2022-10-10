import { Router } from 'express'
import { body, query } from 'express-validator'
import requestValidator from './../middlewares/requestValidator.js'
import sessionValidator from './../middlewares/sessionValidator.js'
import * as controller from './../controllers/instanceController.js'

const router = Router()

router.post(
    '/setPresence',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    body('presence').isIn(['unavailable', 'available', 'composing', 'recording', 'paused']).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.setPresence
)

router.post(
    '/setDisplayPicture',
    query('id').notEmpty(),
    body('phone').notEmpty(),
    body('imageURL').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.setDisplayPicture
)

router.post(
    '/createProduct',
    query('id').notEmpty(),
    body('name').notEmpty(),
    body('retailerId'),
    body('url'),
    body('description'),
    body('price').isInt().notEmpty(),
    body('currency').notEmpty(),
    body('isHidden').isBoolean(),
    body('images').isArray({ min: 1 }).notEmpty(),
    body('originCountryCode'),
    requestValidator,
    sessionValidator,
    controller.createProduct
)

router.post(
    '/updateProduct',
    query('id').notEmpty(),
    body('productId').isString().notEmpty(),
    body('name').notEmpty(),
    body('retailerId'),
    body('url'),
    body('description').notEmpty(),
    body('price').isInt().notEmpty(),
    body('currency').notEmpty(),
    body('isHidden').isBoolean().notEmpty(),
    body('images').isArray({ min: 1 }).notEmpty(),
    requestValidator,
    sessionValidator,
    controller.createProduct
)

router.post(
    '/deleteProduct',
    query('id').notEmpty(),
    body('productIds').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.deleteProduct
)

router.get(
    '/me',
    query('id').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.me
)

export default router
