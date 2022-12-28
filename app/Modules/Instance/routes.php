<?php

	Route::group(['prefix' => '/instances','middleware'=>'InstanceMiddleware'] , function () {
        $controller = App\Http\Controllers\InstancesControllers::class;
        Route::get('/qr', [$controller,'qr']);
        Route::get('/status', [$controller,'status']);
        Route::get('/screenshot', [$controller,'screenshot']);
        Route::post('/disconnect', [$controller,'disconnect']);
        Route::post('/clearInstance', [$controller,'clearInstance']);
        Route::post('/clearInstanceData', [$controller,'clearInstanceData']);
        Route::post('/updateChannelSetting', [$controller,'updateChannelSetting']);
    });

    Route::group(['prefix' => '/queues','middleware'=>'InstanceMiddleware'] , function () {
        $controller = App\Http\Controllers\InstancesControllers::class;
        Route::get('/getMessagesQueue', [$controller,'getMessagesQueue']);
        Route::post('/clearMessagesQueue', [$controller,'clearMessagesQueue']);
    });

    Route::group(['prefix' => '/profiles','middleware'=>'InstanceMiddleware'] , function () {
        $controller = App\Http\Controllers\InstancesControllers::class;
        Route::get('/me', [$controller,'me']);
        Route::post('/updateProfilePicture', [$controller,'updateProfilePicture']);
        Route::post('/updatePresence', [$controller,'updatePresence']);
        Route::post('/updateName', [$controller,'updateName']);
        Route::post('/updateStatus', [$controller,'updateStatus']);
    });

    Route::group(['prefix' => '/messages','middleware'=>'InstanceMiddleware'] , function () {
        $controller = App\Http\Controllers\MessagesControllers::class;
        $replyController = App\Http\Controllers\ReplyControllers::class;
        $bulkController = App\Http\Controllers\BulkControllers::class;

        Route::get('/', [$controller,'fetchMessages']);
        Route::post('/sendMessage', [$controller,'sendMessage']);
        Route::post('/sendImage', [$controller,'sendImage']);
        Route::post('/sendVideo', [$controller,'sendVideo']);
        Route::post('/sendAudio', [$controller,'sendAudio']);
        Route::post('/sendFile', [$controller,'sendFile']);
        Route::post('/sendSticker', [$controller,'sendSticker']);
        Route::post('/sendGif', [$controller,'sendGif']);
        Route::post('/sendLink', [$controller,'sendPreview']);
        Route::post('/sendLocation', [$controller,'sendLocation']);
        Route::post('/sendContact', [$controller,'sendContact']);
        Route::post('/sendDisappearingMessage', [$controller,'sendDisappearingMessage']);
        Route::post('/sendMention', [$controller,'sendMention']);
        Route::post('/sendReaction', [$controller,'sendReaction']);
        Route::post('/sendButtons', [$controller,'sendButtons']);
        Route::post('/sendTemplates', [$controller,'sendTemplates']);
        Route::post('/sendList', [$controller,'sendList']);
        Route::post('/sendGroupInvitation', [$controller,'sendGroupInvitation']);
        Route::post('/sendPoll', [$controller,'sendPoll']);
        Route::post('/forwardMessage', [$controller,'forwardMessage']);
        Route::post('/starMessage', [$controller,'starMessage']);
        Route::post('/unstarMessage', [$controller,'unstarMessage']);
        Route::post('/deleteMessageForAll', [$controller,'deleteMessageForAll']);
        Route::post('/deleteMessageForMe', [$controller,'deleteMessageForMe']);
        Route::post('/repeatHook', [$controller,'repeatHook']);
            

        Route::post('/textReply', [$replyController,'textReply']);
        Route::post('/imageReply', [$replyController,'imageReply']);
        Route::post('/videoReply', [$replyController,'videoReply']);
        Route::post('/audioReply', [$replyController,'audioReply']);
        Route::post('/fileReply', [$replyController,'fileReply']);
        Route::post('/stickerReply', [$replyController,'stickerReply']);
        Route::post('/gifReply', [$replyController,'gifReply']);
        Route::post('/locationReply', [$replyController,'locationReply']);
        Route::post('/contactReply', [$replyController,'contactReply']);
        Route::post('/disappearingReply', [$replyController,'disappearingReply']);
        Route::post('/mentionReply', [$replyController,'mentionReply']);
        Route::post('/reactionReply', [$replyController,'reactionReply']);
        Route::post('/buttonsReply', [$replyController,'buttonsReply']);
        Route::post('/templateReply', [$replyController,'templateReply']);
        Route::post('/listReply', [$replyController,'listReply']);
        Route::post('/linkReply', [$replyController,'linkReply']);
        Route::post('/groupInvitationReply', [$replyController,'groupInvitationReply']);
        Route::post('/productReply', [$replyController,'productReply']);
        Route::post('/catalogReply', [$replyController,'catalogReply']);
        Route::post('/pollReply', [$replyController,'pollReply']);
        

        Route::post('/textBulk', [$bulkController,'textBulk']);
        Route::post('/imageBulk', [$bulkController,'imageBulk']);
        Route::post('/videoBulk', [$bulkController,'videoBulk']);
        Route::post('/audioBulk', [$bulkController,'audioBulk']);
        Route::post('/fileBulk', [$bulkController,'fileBulk']);
        Route::post('/stickerBulk', [$bulkController,'stickerBulk']);
        Route::post('/gifBulk', [$bulkController,'gifBulk']);
        Route::post('/locationBulk', [$bulkController,'locationBulk']);
        Route::post('/contactBulk', [$bulkController,'contactBulk']);
        Route::post('/disappearingBulk', [$bulkController,'disappearingBulk']);
        Route::post('/mentionBulk', [$bulkController,'mentionBulk']);
        Route::post('/buttonsBulk', [$bulkController,'buttonsBulk']);
        Route::post('/templateBulk', [$bulkController,'templateBulk']);
        Route::post('/listBulk', [$bulkController,'listBulk']);
        Route::post('/linkBulk', [$bulkController,'linkBulk']);
        Route::post('/groupInvitationBulk', [$bulkController,'groupInvitationBulk']);
        Route::post('/productBulk', [$bulkController,'productBulk']);
        Route::post('/catalogBulk', [$bulkController,'catalogBulk']);
        Route::post('/pollBulk', [$bulkController,'pollBulk']);


        // Route::post('/sendReply', [$controller,'sendReply']);
        // Route::post('/sendBulk', [$controller,'sendBulk']);
    });

    Route::group(['prefix' => '/chats','middleware'=>'InstanceMiddleware'] , function () {
        $controller = App\Http\Controllers\DialogsControllers::class;
        Route::get('/', [$controller,'fetchDialogs']);
        Route::post('/deleteChat', [$controller,'deleteChat']);
        Route::post('/readChat', [$controller,'readChat']);
        Route::post('/unreadChat', [$controller,'unreadChat']);
        Route::post('/archiveChat', [$controller,'archiveChat']);
        Route::post('/unarchiveChat', [$controller,'unarchiveChat']);
        Route::post('/pinChat', [$controller,'pinChat']);
        Route::post('/unpinChat', [$controller,'unpinChat']);
        Route::post('/muteChat', [$controller,'muteChat']);
        Route::post('/unmuteChat', [$controller,'unmuteChat']);
        Route::post('/typing', [$controller,'typing']);
        Route::post('/recording', [$controller,'recording']);
    });

    Route::group(['prefix' => '/groups','middleware'=>'InstanceMiddleware'] , function () {
        $controller = App\Http\Controllers\GroupsControllers::class;
        Route::get('/', [$controller,'fetchGroups']);
        Route::post('/createGroup', [$controller,'createGroup']);
        Route::post('/renameGroup', [$controller,'renameGroup']);
        Route::post('/updateDescription', [$controller,'updateDescription']);
        Route::post('/updateSetting', [$controller,'updateSetting']);
        Route::post('/getParticipants', [$controller,'getParticipants']);
        Route::post('/addParticipants', [$controller,'addParticipants']);
        Route::post('/removeParticipants', [$controller,'removeParticipants']);
        Route::post('/promoteParticipants', [$controller,'promoteParticipants']);
        Route::post('/demoteParticipants', [$controller,'demoteParticipants']);
        Route::post('/joinGroup', [$controller,'joinGroup']);
        Route::post('/leaveGroup', [$controller,'leaveGroup']);
        Route::post('/getInviteCode', [$controller,'getInviteCode']);
        Route::post('/getInviteInfo', [$controller,'getInviteInfo']);
        Route::post('/acceptInvite', [$controller,'acceptInvite']);
        Route::post('/revokeInvite', [$controller,'revokeInvite']);
        
    });

    Route::group(['prefix' => '/users','middleware'=>'InstanceMiddleware'] , function () {
        $controller = App\Http\Controllers\ChatUserControllers::class;
        Route::get('/contacts', [$controller,'contacts']);
        Route::post('/checkPhone', [$controller,'checkPhone']);
        Route::post('/getUserStatus', [$controller,'getUserStatus']);
        Route::post('/getUserPresence', [$controller,'getUserPresence']);
        Route::post('/getUserPicture', [$controller,'getUserPicture']);
        Route::get('/blockList', [$controller,'blockList']);
        Route::post('/blockUser', [$controller,'blockUser']);
        Route::post('/unblockUser', [$controller,'unblockUser']);
        Route::post('/rejectCall', [$controller,'rejectCall']);
    });

    Route::group(['prefix' => '/business','middleware'=>'InstanceMiddleware'] , function () {
        $controller = App\Http\Controllers\BusinessControllers::class;
        Route::post('/getBusinessProfile', [$controller,'getBusinessProfile']);

        Route::post('/products', [$controller,'products']);
        Route::post('/products/create', [$controller,'createProduct']);
        Route::post('/products/update', [$controller,'updateProduct']);
        Route::post('/products/delete', [$controller,'deleteProduct']);
        Route::post('/sendProduct', [$controller,'sendProduct']);

        Route::post('/orders', [$controller,'orders']);
        Route::post('/getOrder', [$controller,'getOrder']);
        Route::post('/collections', [$controller,'collections']);
        Route::post('/sendCatalog', [$controller,'sendCatalog']);

        Route::get('/labels', [$controller,'labels']);
        Route::post('/labelChat', [$controller,'labelChat']);
        Route::post('/unlabelChat', [$controller,'unlabelChat']);
        Route::post('/labelMessage', [$controller,'labelMessage']);
        Route::post('/unlabelMessage', [$controller,'unlabelMessage']);
        Route::post('/labels/create', [$controller,'createLabel']);
        Route::post('/labels/update', [$controller,'updateLabel']);
        Route::post('/labels/delete', [$controller,'deleteLabel']);

        Route::get('/replies', [$controller,'replies']);
        Route::post('/replies/create', [$controller,'createReply']);
        Route::post('/replies/update', [$controller,'updateReply']);
        Route::post('/replies/delete', [$controller,'deleteReply']);
    });
