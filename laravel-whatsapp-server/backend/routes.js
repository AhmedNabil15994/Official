import { Router } from 'express'
import insanceRoute from './routes/instanceRoute.js'
import sessionsRoute from './routes/sessionsRoute.js'
import chatsRoute from './routes/chatsRoute.js'
import messagesRoute from './routes/messagesRoute.js'
import usersRoute from './routes/usersRoute.js'
import response from './response.js'

const router = Router()

router.use('/instance', insanceRoute)
router.use('/session', sessionsRoute)
router.use('/chats', chatsRoute)
router.use('/messages', messagesRoute)
router.use('/users', usersRoute)

router.all('*', (req, res) => {
    response(res, 404, false, 'The requested url cannot be found.')
})

export default router
