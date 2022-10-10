import { getSession, formatPhone } from './../whatsapp.js'
import response from '../response.js'
import { readFileSync } from 'fs'

const setPresence = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)
    const { presence } = req.body

    try {
        const updated = await session.sendPresenceUpdate(presence, phone)

        if (updated) {
            return response(res, 200, true, '')
        }

        return response(res, 500, false, 'Failed to set user presence.')
    } catch {
        return response(res, 500, false, 'Failed to set user presence.')
    }
}

const setDisplayPicture = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const phone = formatPhone(req.body.phone)
    const { imageURL } = req.body

    try {
        const updated = await session.updateProfilePicture(phone, { url: imageURL })

        if (updated) {
            return response(res, 200, true, '')
        }

        return response(res, 500, false, 'Failed to set user display picture.')
    } catch {
        return response(res, 500, false, 'Failed to set user display picture.')
    }
}

const createProduct = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const { name, retailerId, url, description, price, currency, isHidden, originCountryCode, images } = req.body

    try {
        const product = await session.productCreate({
            name,
            retailerId,
            url,
            description,
            price,
            currency,
            isHidden,
            originCountryCode,
            images: images.map((image) => {
                return { url: image }
            }),
        })

        if (product) {
            return response(res, 200, true, '', product)
        }

        return response(res, 500, false, 'Failed to create product')
    } catch (ex) {
        console.log(ex)
        return response(res, 500, false, 'Failed to create product.')
    }
}

const updateProduct = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const { productId, name, retailerId, url, description, price, currency, isHidden, originCountryCode, images } =
        req.body

    try {
        const product = await session.productUpdate(productId, {
            name,
            retailerId,
            url,
            description,
            price,
            currency,
            isHidden,
            originCountryCode,
            images: images.map((image) => {
                return { url: image }
            }),
        })

        if (product) {
            return response(res, 200, true, '', product)
        }

        return response(res, 500, false, 'Failed to update product')
    } catch {
        return response(res, 500, false, 'Failed to update product.')
    }
}

const deleteProduct = async (req, res) => {
    const session = getSession(res.locals.sessionId)
    const { productIds } = req.body

    try {
        const deleted = await session.productDelete(Array.isArray() ? productIds : [productIds])

        return response(res, 200, true, '', deleted)
    } catch {
        return response(res, 500, false, 'Failed to update product.')
    }
}

const me = async (req, res) => {
    const session = getSession(res.locals.sessionId)

    try {
        let dataStore =  await JSON.parse(readFileSync('./sessions/md_'+res.locals.sessionId+'.json', 'utf8'))
        let dataObj = {}
        let phone 
        let image = ''
        if(dataStore.creds && dataStore.creds.me){
            dataObj.me = dataStore.creds.me
            phone = dataStore.creds.me.id.replace('@s.whatsapp.net','').split(':')[0]
            delete dataObj.me.id
            dataObj.me['phone'] = phone
            try{
                image = await session.profilePictureUrl(formatPhone(phone), 'image')
            }catch{}
        }else{
            dataObj.me = session.user
            phone = session.user.id.replace('@s.whatsapp.net','').split(':')[0]
            delete dataObj.me.id
            dataObj.me['phone'] = phone
            image = await session.profilePictureUrl(formatPhone(phone), 'image')
        }

        const presence = await session.presenceSubscribe(formatPhone(phone))
        const status = await session.fetchStatus(formatPhone(phone))
        const profile = await session.getBusinessProfile(formatPhone(phone))
       
        dataObj.image = image;
        dataObj.presence = presence;
        dataObj.status = status;
        dataObj.isBussines = profile ? 1 : 0;
        dataObj.businessProfile = profile ? profile : null;
        if(profile){
            delete dataObj.businessProfile.wid
        }        
        return response(res, 200, true, '', dataObj)
    } catch {
        return response(res, 500, false, 'Failed to get user Data.')
    }
}

export { setPresence, setDisplayPicture, createProduct, updateProduct, deleteProduct,me }
