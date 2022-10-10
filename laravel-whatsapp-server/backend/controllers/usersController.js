import { getSession, formatPhone, isExists, getProductById } from './../whatsapp.js'
import response from '../response.js'

const userStatus = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)

    try {
        const exists = await isExists(session, phone,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'The phone number does not exist.')
        }

        const status = await session.fetchStatus(phone)

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to get user status.')
    }
}

const userPresence = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)

    try {
        const exists = await isExists(session, phone,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'The phone number does not exist.')
        }

        const presence = await session.presenceSubscribe(phone)

        return response(res, 200, true, '', presence)
    } catch {
        return response(res, 500, false, 'Failed to get user presence.')
    }
}

const userDisplayPicture = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)

    try {
        const exists = await isExists(session, phone,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'The phone number does not exist.')
        }

        const image = await session.profilePictureUrl(phone, 'image')

        return response(res, 200, true, '', image)
    } catch {
        return response(res, 500, false, 'Failed to get user display picture.')
    }
}

const blockUser = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)

    try {
        const exists = await isExists(session, phone,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'The phone number does not exist.')
        }

        const status = await session.updateBlockStatus(phone, 'block')

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to block user.')
    }
}

const unblockUser = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)

    try {
        const exists = await isExists(session, phone,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'The phone number does not exist.')
        }

        const status = await session.updateBlockStatus(phone, 'unblock')

        return response(res, 200, true, '', status)
    } catch {
        return response(res, 500, false, 'Failed to unblock user.')
    }
}

const businessProfile = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)

    try {
        const exists = await isExists(session, phone,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'The phone number does not exist.')
        }

        const profile = await session.getBusinessProfile(phone)

        return response(res, 200, true, '', profile)
    } catch {
        return response(res, 500, false, 'Failed to get user profile.')
    }
}

const getProducts = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)

    try {
        const exists = await isExists(session, phone,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'The phone number does not exist.')
        }

        const products = await session.getCatalog(phone)

        return response(res, 200, true, '', products)
    } catch (ex) {
        console.log(ex)
        return response(res, 500, false, 'Failed to get user products or user doesnt have any products.')
    }
}

const getProduct = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)
    const { productId } = req.body

    try {
        const exists = await isExists(session, phone,(! req.body.phone ? true : false ))

        if (!exists) {
            return response(res, 400, false, 'The phone number does not exist.')
        }

        const product = await getProductById(session, phone, productId)

        return response(res, 200, true, '', product)
    } catch (ex) {
        console.log(ex)
        return response(res, 500, false, 'Failed to get product or it doesnt exist.')
    }
}

const getOrder = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const { orderId, orderToken } = req.body

    try {
        const order = await session.getOrderDetails(orderId, orderToken)

        return response(res, 200, true, '', order)
    } catch (ex) {
        console.log(ex)
        return response(res, 500, false, 'Failed to get order or it doesnt exist.')
    }
}

export {
    userStatus,
    userPresence,
    userDisplayPicture,
    blockUser,
    unblockUser,
    businessProfile,
    getProducts,
    getProduct,
    getOrder,
}
