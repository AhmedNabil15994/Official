<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
                    body .content .python-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://official.whatsapp.loc";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-3.37.2.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-3.37.2.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;,&quot;python&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                                            <button type="button" class="lang-button" data-language-name="python">python</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-instances-qr">
                        <a href="#endpoints-GETengine-instances-qr">GET engine/instances/qr</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-users-contacts">
                        <a href="#endpoints-GETengine-users-contacts">GET engine/users/contacts</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendMessage">
                        <a href="#endpoints-POSTengine-messages-sendMessage">POST engine/messages/sendMessage</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-instances-status">
                        <a href="#endpoints-GETengine-instances-status">GET engine/instances/status</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-channels-createChannel">
                        <a href="#endpoints-POSTengine-channels-createChannel">POST engine/channels/createChannel</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-instances-disconnect">
                        <a href="#endpoints-POSTengine-instances-disconnect">POST engine/instances/disconnect</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-users-getUserStatus">
                        <a href="#endpoints-POSTengine-users-getUserStatus">POST engine/users/getUserStatus</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendImage">
                        <a href="#endpoints-POSTengine-messages-sendImage">POST engine/messages/sendImage</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-users-getUserPresence">
                        <a href="#endpoints-POSTengine-users-getUserPresence">POST engine/users/getUserPresence</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-instances-clearInstance">
                        <a href="#endpoints-POSTengine-instances-clearInstance">POST engine/instances/clearInstance</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendAudio">
                        <a href="#endpoints-POSTengine-messages-sendAudio">POST engine/messages/sendAudio</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-instances-updateChannelSetting">
                        <a href="#endpoints-POSTengine-instances-updateChannelSetting">POST engine/instances/updateChannelSetting</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendVideo">
                        <a href="#endpoints-POSTengine-messages-sendVideo">POST engine/messages/sendVideo</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendFile">
                        <a href="#endpoints-POSTengine-messages-sendFile">POST engine/messages/sendFile</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-users-blockUser">
                        <a href="#endpoints-POSTengine-users-blockUser">POST engine/users/blockUser</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendSticker">
                        <a href="#endpoints-POSTengine-messages-sendSticker">POST engine/messages/sendSticker</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-users-unblockUser">
                        <a href="#endpoints-POSTengine-users-unblockUser">POST engine/users/unblockUser</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendGif">
                        <a href="#endpoints-POSTengine-messages-sendGif">POST engine/messages/sendGif</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-users-checkPhone">
                        <a href="#endpoints-POSTengine-users-checkPhone">POST engine/users/checkPhone</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendLink">
                        <a href="#endpoints-POSTengine-messages-sendLink">POST engine/messages/sendLink</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendLocation">
                        <a href="#endpoints-POSTengine-messages-sendLocation">POST engine/messages/sendLocation</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendContact">
                        <a href="#endpoints-POSTengine-messages-sendContact">POST engine/messages/sendContact</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendDisappearingMessage">
                        <a href="#endpoints-POSTengine-messages-sendDisappearingMessage">POST engine/messages/sendDisappearingMessage</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendMention">
                        <a href="#endpoints-POSTengine-messages-sendMention">POST engine/messages/sendMention</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendReaction">
                        <a href="#endpoints-POSTengine-messages-sendReaction">POST engine/messages/sendReaction</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendButtons">
                        <a href="#endpoints-POSTengine-messages-sendButtons">POST engine/messages/sendButtons</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendTemplates">
                        <a href="#endpoints-POSTengine-messages-sendTemplates">POST engine/messages/sendTemplates</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendList">
                        <a href="#endpoints-POSTengine-messages-sendList">POST engine/messages/sendList</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-forwardMessage">
                        <a href="#endpoints-POSTengine-messages-forwardMessage">POST engine/messages/forwardMessage</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-deleteMessageForAll">
                        <a href="#endpoints-POSTengine-messages-deleteMessageForAll">POST engine/messages/deleteMessageForAll</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-deleteMessageForMe">
                        <a href="#endpoints-POSTengine-messages-deleteMessageForMe">POST engine/messages/deleteMessageForMe</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-repeatHook">
                        <a href="#endpoints-POSTengine-messages-repeatHook">POST engine/messages/repeatHook</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-starMessage">
                        <a href="#endpoints-POSTengine-messages-starMessage">POST engine/messages/starMessage</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-unstarMessage">
                        <a href="#endpoints-POSTengine-messages-unstarMessage">POST engine/messages/unstarMessage</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-getInviteCode">
                        <a href="#endpoints-POSTengine-groups-getInviteCode">POST engine/groups/getInviteCode</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-leaveGroup">
                        <a href="#endpoints-POSTengine-groups-leaveGroup">POST engine/groups/leaveGroup</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-revokeInvite">
                        <a href="#endpoints-POSTengine-groups-revokeInvite">POST engine/groups/revokeInvite</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-getInviteInfo">
                        <a href="#endpoints-POSTengine-groups-getInviteInfo">POST engine/groups/getInviteInfo</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-acceptInvite">
                        <a href="#endpoints-POSTengine-groups-acceptInvite">POST engine/groups/acceptInvite</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-joinGroup">
                        <a href="#endpoints-POSTengine-groups-joinGroup">POST engine/groups/joinGroup</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-queues-getMessagesQueue">
                        <a href="#endpoints-GETengine-queues-getMessagesQueue">GET engine/queues/getMessagesQueue</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-demoteParticipants">
                        <a href="#endpoints-POSTengine-groups-demoteParticipants">POST engine/groups/demoteParticipants</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-promoteParticipants">
                        <a href="#endpoints-POSTengine-groups-promoteParticipants">POST engine/groups/promoteParticipants</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-removeParticipants">
                        <a href="#endpoints-POSTengine-groups-removeParticipants">POST engine/groups/removeParticipants</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-addParticipants">
                        <a href="#endpoints-POSTengine-groups-addParticipants">POST engine/groups/addParticipants</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-getParticipants">
                        <a href="#endpoints-POSTengine-groups-getParticipants">POST engine/groups/getParticipants</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-users-getUserPicture">
                        <a href="#endpoints-POSTengine-users-getUserPicture">POST engine/users/getUserPicture</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-updateDescription">
                        <a href="#endpoints-POSTengine-groups-updateDescription">POST engine/groups/updateDescription</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-renameGroup">
                        <a href="#endpoints-POSTengine-groups-renameGroup">POST engine/groups/renameGroup</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-createGroup">
                        <a href="#endpoints-POSTengine-groups-createGroup">POST engine/groups/createGroup</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-groups">
                        <a href="#endpoints-GETengine-groups">GET engine/groups</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-recording">
                        <a href="#endpoints-POSTengine-chats-recording">POST engine/chats/recording</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-typing">
                        <a href="#endpoints-POSTengine-chats-typing">POST engine/chats/typing</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-groups-updateSetting">
                        <a href="#endpoints-POSTengine-groups-updateSetting">POST engine/groups/updateSetting</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-sendCatalog">
                        <a href="#endpoints-POSTengine-business-sendCatalog">POST engine/business/sendCatalog</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-users-blockList">
                        <a href="#endpoints-GETengine-users-blockList">GET engine/users/blockList</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-unlabelChat">
                        <a href="#endpoints-POSTengine-business-unlabelChat">POST engine/business/unlabelChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-channels">
                        <a href="#endpoints-GETengine-channels">GET engine/channels</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-replies-delete">
                        <a href="#endpoints-POSTengine-business-replies-delete">POST engine/business/replies/delete</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-replies-update">
                        <a href="#endpoints-POSTengine-business-replies-update">POST engine/business/replies/update</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-replies-create">
                        <a href="#endpoints-POSTengine-business-replies-create">POST engine/business/replies/create</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-business-replies">
                        <a href="#endpoints-GETengine-business-replies">GET engine/business/replies</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-labels-delete">
                        <a href="#endpoints-POSTengine-business-labels-delete">POST engine/business/labels/delete</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-labels-update">
                        <a href="#endpoints-POSTengine-business-labels-update">POST engine/business/labels/update</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-labels-create">
                        <a href="#endpoints-POSTengine-business-labels-create">POST engine/business/labels/create</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-unlabelMessage">
                        <a href="#endpoints-POSTengine-business-unlabelMessage">POST engine/business/unlabelMessage</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-labelMessage">
                        <a href="#endpoints-POSTengine-business-labelMessage">POST engine/business/labelMessage</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-labelChat">
                        <a href="#endpoints-POSTengine-business-labelChat">POST engine/business/labelChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-users-rejectCall">
                        <a href="#endpoints-POSTengine-users-rejectCall">POST engine/users/rejectCall</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-business-labels">
                        <a href="#endpoints-GETengine-business-labels">GET engine/business/labels</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-muteChat">
                        <a href="#endpoints-POSTengine-chats-muteChat">POST engine/chats/muteChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-collections">
                        <a href="#endpoints-POSTengine-business-collections">POST engine/business/collections</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-getOrder">
                        <a href="#endpoints-POSTengine-business-getOrder">POST engine/business/getOrder</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-sendProduct">
                        <a href="#endpoints-POSTengine-business-sendProduct">POST engine/business/sendProduct</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-products-delete">
                        <a href="#endpoints-POSTengine-business-products-delete">POST engine/business/products/delete</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-products-update">
                        <a href="#endpoints-POSTengine-business-products-update">POST engine/business/products/update</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-products-create">
                        <a href="#endpoints-POSTengine-business-products-create">POST engine/business/products/create</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-products">
                        <a href="#endpoints-POSTengine-business-products">POST engine/business/products</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-business-getBusinessProfile">
                        <a href="#endpoints-POSTengine-business-getBusinessProfile">POST engine/business/getBusinessProfile</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-unmuteChat">
                        <a href="#endpoints-POSTengine-chats-unmuteChat">POST engine/chats/unmuteChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-linkBulk">
                        <a href="#endpoints-POSTengine-messages-linkBulk">POST engine/messages/linkBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-unpinChat">
                        <a href="#endpoints-POSTengine-chats-unpinChat">POST engine/chats/unpinChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-fileReply">
                        <a href="#endpoints-POSTengine-messages-fileReply">POST engine/messages/fileReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-listReply">
                        <a href="#endpoints-POSTengine-messages-listReply">POST engine/messages/listReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-templateReply">
                        <a href="#endpoints-POSTengine-messages-templateReply">POST engine/messages/templateReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-buttonsReply">
                        <a href="#endpoints-POSTengine-messages-buttonsReply">POST engine/messages/buttonsReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-reactionReply">
                        <a href="#endpoints-POSTengine-messages-reactionReply">POST engine/messages/reactionReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-mentionReply">
                        <a href="#endpoints-POSTengine-messages-mentionReply">POST engine/messages/mentionReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-disappearingReply">
                        <a href="#endpoints-POSTengine-messages-disappearingReply">POST engine/messages/disappearingReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-contactReply">
                        <a href="#endpoints-POSTengine-messages-contactReply">POST engine/messages/contactReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-locationReply">
                        <a href="#endpoints-POSTengine-messages-locationReply">POST engine/messages/locationReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-gifReply">
                        <a href="#endpoints-POSTengine-messages-gifReply">POST engine/messages/gifReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-stickerReply">
                        <a href="#endpoints-POSTengine-messages-stickerReply">POST engine/messages/stickerReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-audioReply">
                        <a href="#endpoints-POSTengine-messages-audioReply">POST engine/messages/audioReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-groupInvitationReply">
                        <a href="#endpoints-POSTengine-messages-groupInvitationReply">POST engine/messages/groupInvitationReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-videoReply">
                        <a href="#endpoints-POSTengine-messages-videoReply">POST engine/messages/videoReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-imageReply">
                        <a href="#endpoints-POSTengine-messages-imageReply">POST engine/messages/imageReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-textReply">
                        <a href="#endpoints-POSTengine-messages-textReply">POST engine/messages/textReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-sendGroupInvitation">
                        <a href="#endpoints-POSTengine-messages-sendGroupInvitation">POST engine/messages/sendGroupInvitation</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-messages">
                        <a href="#endpoints-GETengine-messages">GET engine/messages</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-profiles-updateStatus">
                        <a href="#endpoints-POSTengine-profiles-updateStatus">POST engine/profiles/updateStatus</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-profiles-updateName">
                        <a href="#endpoints-POSTengine-profiles-updateName">POST engine/profiles/updateName</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-profiles-updatePresence">
                        <a href="#endpoints-POSTengine-profiles-updatePresence">POST engine/profiles/updatePresence</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-profiles-updateProfilePicture">
                        <a href="#endpoints-POSTengine-profiles-updateProfilePicture">POST engine/profiles/updateProfilePicture</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-profiles-me">
                        <a href="#endpoints-GETengine-profiles-me">GET engine/profiles/me</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-linkReply">
                        <a href="#endpoints-POSTengine-messages-linkReply">POST engine/messages/linkReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-productReply">
                        <a href="#endpoints-POSTengine-messages-productReply">POST engine/messages/productReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-pinChat">
                        <a href="#endpoints-POSTengine-chats-pinChat">POST engine/chats/pinChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-listBulk">
                        <a href="#endpoints-POSTengine-messages-listBulk">POST engine/messages/listBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-unarchiveChat">
                        <a href="#endpoints-POSTengine-chats-unarchiveChat">POST engine/chats/unarchiveChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-archiveChat">
                        <a href="#endpoints-POSTengine-chats-archiveChat">POST engine/chats/archiveChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-unreadChat">
                        <a href="#endpoints-POSTengine-chats-unreadChat">POST engine/chats/unreadChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-readChat">
                        <a href="#endpoints-POSTengine-chats-readChat">POST engine/chats/readChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-chats-deleteChat">
                        <a href="#endpoints-POSTengine-chats-deleteChat">POST engine/chats/deleteChat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETengine-chats">
                        <a href="#endpoints-GETengine-chats">GET engine/chats</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-catalogBulk">
                        <a href="#endpoints-POSTengine-messages-catalogBulk">POST engine/messages/catalogBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-productBulk">
                        <a href="#endpoints-POSTengine-messages-productBulk">POST engine/messages/productBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-groupInvitationBulk">
                        <a href="#endpoints-POSTengine-messages-groupInvitationBulk">POST engine/messages/groupInvitationBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-queues-clearMessagesQueue">
                        <a href="#endpoints-POSTengine-queues-clearMessagesQueue">POST engine/queues/clearMessagesQueue</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-templateBulk">
                        <a href="#endpoints-POSTengine-messages-templateBulk">POST engine/messages/templateBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-catalogReply">
                        <a href="#endpoints-POSTengine-messages-catalogReply">POST engine/messages/catalogReply</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-mentionBulk">
                        <a href="#endpoints-POSTengine-messages-mentionBulk">POST engine/messages/mentionBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-disappearingBulk">
                        <a href="#endpoints-POSTengine-messages-disappearingBulk">POST engine/messages/disappearingBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-contactBulk">
                        <a href="#endpoints-POSTengine-messages-contactBulk">POST engine/messages/contactBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-locationBulk">
                        <a href="#endpoints-POSTengine-messages-locationBulk">POST engine/messages/locationBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-gifBulk">
                        <a href="#endpoints-POSTengine-messages-gifBulk">POST engine/messages/gifBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-stickerBulk">
                        <a href="#endpoints-POSTengine-messages-stickerBulk">POST engine/messages/stickerBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-fileBulk">
                        <a href="#endpoints-POSTengine-messages-fileBulk">POST engine/messages/fileBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-audioBulk">
                        <a href="#endpoints-POSTengine-messages-audioBulk">POST engine/messages/audioBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-videoBulk">
                        <a href="#endpoints-POSTengine-messages-videoBulk">POST engine/messages/videoBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-imageBulk">
                        <a href="#endpoints-POSTengine-messages-imageBulk">POST engine/messages/imageBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-textBulk">
                        <a href="#endpoints-POSTengine-messages-textBulk">POST engine/messages/textBulk</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTengine-messages-buttonsBulk">
                        <a href="#endpoints-POSTengine-messages-buttonsBulk">POST engine/messages/buttonsBulk</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="channels">
                    <a href="#channels">Channels</a>
                </li>
                                    <ul id="tocify-subheader-channels" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="channels-POSTengine-channels-deleteChannel">
                        <a href="#channels-POSTengine-channels-deleteChannel">API for deleteing specific channel by id</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="channels-POSTengine-channels-transferDays">
                        <a href="#channels-POSTengine-channels-transferDays">API for transfering days from a channel to another</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: October 10 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://official.whatsapp.loc/</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>Authenticate requests to this API's endpoints by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-GETengine-instances-qr">GET engine/instances/qr</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-instances-qr">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/instances/qr" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/instances/qr"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/instances/qr',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/instances/qr'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-instances-qr">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=q8IyLl79DgQOgeV24Z5OBTHWy7E8NbfPxIDmZHoc; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-instances-qr" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-instances-qr"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-instances-qr"></code></pre>
</span>
<span id="execution-error-GETengine-instances-qr" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-instances-qr"></code></pre>
</span>
<form id="form-GETengine-instances-qr" data-method="GET"
      data-path="engine/instances/qr"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-instances-qr', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-instances-qr"
                    onclick="tryItOut('GETengine-instances-qr');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-instances-qr"
                    onclick="cancelTryOut('GETengine-instances-qr');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-instances-qr" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/instances/qr</code></b>
        </p>
                <p>
            <label id="auth-GETengine-instances-qr" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-instances-qr"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-users-contacts">GET engine/users/contacts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-users-contacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/users/contacts" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/contacts"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/users/contacts',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/users/contacts'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-users-contacts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=lq3luxXgFhEldday2irVWujFJH4nsyBasSJKN1Fd; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-users-contacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-users-contacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-users-contacts"></code></pre>
</span>
<span id="execution-error-GETengine-users-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-users-contacts"></code></pre>
</span>
<form id="form-GETengine-users-contacts" data-method="GET"
      data-path="engine/users/contacts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-users-contacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-users-contacts"
                    onclick="tryItOut('GETengine-users-contacts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-users-contacts"
                    onclick="cancelTryOut('GETengine-users-contacts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-users-contacts" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/users/contacts</code></b>
        </p>
                <p>
            <label id="auth-GETengine-users-contacts" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-users-contacts"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendMessage">POST engine/messages/sendMessage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendMessage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendMessage" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendMessage"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendMessage',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendMessage'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendMessage">
</span>
<span id="execution-results-POSTengine-messages-sendMessage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendMessage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendMessage"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendMessage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendMessage"></code></pre>
</span>
<form id="form-POSTengine-messages-sendMessage" data-method="POST"
      data-path="engine/messages/sendMessage"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendMessage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendMessage"
                    onclick="tryItOut('POSTengine-messages-sendMessage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendMessage"
                    onclick="cancelTryOut('POSTengine-messages-sendMessage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendMessage" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendMessage</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendMessage" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendMessage"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-instances-status">GET engine/instances/status</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-instances-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/instances/status" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/instances/status"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/instances/status',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/instances/status'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-instances-status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=WCX0ZWbS8UbMuldT1hEfGnvkT2Uo1XHJ2182OPvS; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-instances-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-instances-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-instances-status"></code></pre>
</span>
<span id="execution-error-GETengine-instances-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-instances-status"></code></pre>
</span>
<form id="form-GETengine-instances-status" data-method="GET"
      data-path="engine/instances/status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-instances-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-instances-status"
                    onclick="tryItOut('GETengine-instances-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-instances-status"
                    onclick="cancelTryOut('GETengine-instances-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-instances-status" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/instances/status</code></b>
        </p>
                <p>
            <label id="auth-GETengine-instances-status" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-instances-status"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-channels-createChannel">POST engine/channels/createChannel</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-channels-createChannel">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/channels/createChannel" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/channels/createChannel"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/channels/createChannel',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/channels/createChannel'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-channels-createChannel">
</span>
<span id="execution-results-POSTengine-channels-createChannel" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-channels-createChannel"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-channels-createChannel"></code></pre>
</span>
<span id="execution-error-POSTengine-channels-createChannel" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-channels-createChannel"></code></pre>
</span>
<form id="form-POSTengine-channels-createChannel" data-method="POST"
      data-path="engine/channels/createChannel"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-channels-createChannel', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-channels-createChannel"
                    onclick="tryItOut('POSTengine-channels-createChannel');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-channels-createChannel"
                    onclick="cancelTryOut('POSTengine-channels-createChannel');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-channels-createChannel" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/channels/createChannel</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-channels-createChannel" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-channels-createChannel"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-instances-disconnect">POST engine/instances/disconnect</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-instances-disconnect">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/instances/disconnect" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/instances/disconnect"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/instances/disconnect',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/instances/disconnect'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-instances-disconnect">
</span>
<span id="execution-results-POSTengine-instances-disconnect" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-instances-disconnect"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-instances-disconnect"></code></pre>
</span>
<span id="execution-error-POSTengine-instances-disconnect" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-instances-disconnect"></code></pre>
</span>
<form id="form-POSTengine-instances-disconnect" data-method="POST"
      data-path="engine/instances/disconnect"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-instances-disconnect', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-instances-disconnect"
                    onclick="tryItOut('POSTengine-instances-disconnect');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-instances-disconnect"
                    onclick="cancelTryOut('POSTengine-instances-disconnect');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-instances-disconnect" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/instances/disconnect</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-instances-disconnect" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-instances-disconnect"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-users-getUserStatus">POST engine/users/getUserStatus</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-getUserStatus">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/getUserStatus" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/getUserStatus"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/users/getUserStatus',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/users/getUserStatus'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-users-getUserStatus">
</span>
<span id="execution-results-POSTengine-users-getUserStatus" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-getUserStatus"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-getUserStatus"></code></pre>
</span>
<span id="execution-error-POSTengine-users-getUserStatus" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-getUserStatus"></code></pre>
</span>
<form id="form-POSTengine-users-getUserStatus" data-method="POST"
      data-path="engine/users/getUserStatus"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-getUserStatus', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-getUserStatus"
                    onclick="tryItOut('POSTengine-users-getUserStatus');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-getUserStatus"
                    onclick="cancelTryOut('POSTengine-users-getUserStatus');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-getUserStatus" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/getUserStatus</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-getUserStatus" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-getUserStatus"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendImage">POST engine/messages/sendImage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendImage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendImage" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendImage"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendImage',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendImage'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendImage">
</span>
<span id="execution-results-POSTengine-messages-sendImage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendImage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendImage"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendImage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendImage"></code></pre>
</span>
<form id="form-POSTengine-messages-sendImage" data-method="POST"
      data-path="engine/messages/sendImage"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendImage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendImage"
                    onclick="tryItOut('POSTengine-messages-sendImage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendImage"
                    onclick="cancelTryOut('POSTengine-messages-sendImage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendImage" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendImage</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendImage" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendImage"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-users-getUserPresence">POST engine/users/getUserPresence</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-getUserPresence">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/getUserPresence" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/getUserPresence"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/users/getUserPresence',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/users/getUserPresence'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-users-getUserPresence">
</span>
<span id="execution-results-POSTengine-users-getUserPresence" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-getUserPresence"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-getUserPresence"></code></pre>
</span>
<span id="execution-error-POSTengine-users-getUserPresence" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-getUserPresence"></code></pre>
</span>
<form id="form-POSTengine-users-getUserPresence" data-method="POST"
      data-path="engine/users/getUserPresence"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-getUserPresence', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-getUserPresence"
                    onclick="tryItOut('POSTengine-users-getUserPresence');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-getUserPresence"
                    onclick="cancelTryOut('POSTengine-users-getUserPresence');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-getUserPresence" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/getUserPresence</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-getUserPresence" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-getUserPresence"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-instances-clearInstance">POST engine/instances/clearInstance</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-instances-clearInstance">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/instances/clearInstance" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/instances/clearInstance"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/instances/clearInstance',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/instances/clearInstance'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-instances-clearInstance">
</span>
<span id="execution-results-POSTengine-instances-clearInstance" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-instances-clearInstance"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-instances-clearInstance"></code></pre>
</span>
<span id="execution-error-POSTengine-instances-clearInstance" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-instances-clearInstance"></code></pre>
</span>
<form id="form-POSTengine-instances-clearInstance" data-method="POST"
      data-path="engine/instances/clearInstance"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-instances-clearInstance', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-instances-clearInstance"
                    onclick="tryItOut('POSTengine-instances-clearInstance');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-instances-clearInstance"
                    onclick="cancelTryOut('POSTengine-instances-clearInstance');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-instances-clearInstance" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/instances/clearInstance</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-instances-clearInstance" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-instances-clearInstance"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendAudio">POST engine/messages/sendAudio</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendAudio">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendAudio" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendAudio"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendAudio',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendAudio'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendAudio">
</span>
<span id="execution-results-POSTengine-messages-sendAudio" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendAudio"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendAudio"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendAudio" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendAudio"></code></pre>
</span>
<form id="form-POSTengine-messages-sendAudio" data-method="POST"
      data-path="engine/messages/sendAudio"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendAudio', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendAudio"
                    onclick="tryItOut('POSTengine-messages-sendAudio');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendAudio"
                    onclick="cancelTryOut('POSTengine-messages-sendAudio');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendAudio" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendAudio</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendAudio" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendAudio"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-instances-updateChannelSetting">POST engine/instances/updateChannelSetting</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-instances-updateChannelSetting">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/instances/updateChannelSetting" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/instances/updateChannelSetting"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/instances/updateChannelSetting',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/instances/updateChannelSetting'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-instances-updateChannelSetting">
</span>
<span id="execution-results-POSTengine-instances-updateChannelSetting" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-instances-updateChannelSetting"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-instances-updateChannelSetting"></code></pre>
</span>
<span id="execution-error-POSTengine-instances-updateChannelSetting" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-instances-updateChannelSetting"></code></pre>
</span>
<form id="form-POSTengine-instances-updateChannelSetting" data-method="POST"
      data-path="engine/instances/updateChannelSetting"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-instances-updateChannelSetting', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-instances-updateChannelSetting"
                    onclick="tryItOut('POSTengine-instances-updateChannelSetting');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-instances-updateChannelSetting"
                    onclick="cancelTryOut('POSTengine-instances-updateChannelSetting');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-instances-updateChannelSetting" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/instances/updateChannelSetting</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-instances-updateChannelSetting" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-instances-updateChannelSetting"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendVideo">POST engine/messages/sendVideo</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendVideo">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendVideo" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendVideo"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendVideo',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendVideo'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendVideo">
</span>
<span id="execution-results-POSTengine-messages-sendVideo" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendVideo"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendVideo"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendVideo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendVideo"></code></pre>
</span>
<form id="form-POSTengine-messages-sendVideo" data-method="POST"
      data-path="engine/messages/sendVideo"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendVideo', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendVideo"
                    onclick="tryItOut('POSTengine-messages-sendVideo');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendVideo"
                    onclick="cancelTryOut('POSTengine-messages-sendVideo');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendVideo" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendVideo</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendVideo" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendVideo"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendFile">POST engine/messages/sendFile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendFile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendFile" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendFile"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendFile',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendFile'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendFile">
</span>
<span id="execution-results-POSTengine-messages-sendFile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendFile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendFile"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendFile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendFile"></code></pre>
</span>
<form id="form-POSTengine-messages-sendFile" data-method="POST"
      data-path="engine/messages/sendFile"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendFile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendFile"
                    onclick="tryItOut('POSTengine-messages-sendFile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendFile"
                    onclick="cancelTryOut('POSTengine-messages-sendFile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendFile" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendFile</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendFile" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendFile"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-users-blockUser">POST engine/users/blockUser</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-blockUser">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/blockUser" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/blockUser"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/users/blockUser',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/users/blockUser'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-users-blockUser">
</span>
<span id="execution-results-POSTengine-users-blockUser" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-blockUser"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-blockUser"></code></pre>
</span>
<span id="execution-error-POSTengine-users-blockUser" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-blockUser"></code></pre>
</span>
<form id="form-POSTengine-users-blockUser" data-method="POST"
      data-path="engine/users/blockUser"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-blockUser', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-blockUser"
                    onclick="tryItOut('POSTengine-users-blockUser');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-blockUser"
                    onclick="cancelTryOut('POSTengine-users-blockUser');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-blockUser" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/blockUser</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-blockUser" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-blockUser"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendSticker">POST engine/messages/sendSticker</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendSticker">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendSticker" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendSticker"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendSticker',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendSticker'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendSticker">
</span>
<span id="execution-results-POSTengine-messages-sendSticker" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendSticker"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendSticker"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendSticker" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendSticker"></code></pre>
</span>
<form id="form-POSTengine-messages-sendSticker" data-method="POST"
      data-path="engine/messages/sendSticker"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendSticker', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendSticker"
                    onclick="tryItOut('POSTengine-messages-sendSticker');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendSticker"
                    onclick="cancelTryOut('POSTengine-messages-sendSticker');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendSticker" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendSticker</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendSticker" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendSticker"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-users-unblockUser">POST engine/users/unblockUser</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-unblockUser">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/unblockUser" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/unblockUser"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/users/unblockUser',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/users/unblockUser'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-users-unblockUser">
</span>
<span id="execution-results-POSTengine-users-unblockUser" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-unblockUser"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-unblockUser"></code></pre>
</span>
<span id="execution-error-POSTengine-users-unblockUser" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-unblockUser"></code></pre>
</span>
<form id="form-POSTengine-users-unblockUser" data-method="POST"
      data-path="engine/users/unblockUser"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-unblockUser', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-unblockUser"
                    onclick="tryItOut('POSTengine-users-unblockUser');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-unblockUser"
                    onclick="cancelTryOut('POSTengine-users-unblockUser');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-unblockUser" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/unblockUser</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-unblockUser" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-unblockUser"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendGif">POST engine/messages/sendGif</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendGif">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendGif" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendGif"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendGif',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendGif'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendGif">
</span>
<span id="execution-results-POSTengine-messages-sendGif" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendGif"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendGif"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendGif" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendGif"></code></pre>
</span>
<form id="form-POSTengine-messages-sendGif" data-method="POST"
      data-path="engine/messages/sendGif"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendGif', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendGif"
                    onclick="tryItOut('POSTengine-messages-sendGif');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendGif"
                    onclick="cancelTryOut('POSTengine-messages-sendGif');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendGif" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendGif</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendGif" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendGif"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-users-checkPhone">POST engine/users/checkPhone</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-checkPhone">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/checkPhone" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/checkPhone"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/users/checkPhone',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/users/checkPhone'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-users-checkPhone">
</span>
<span id="execution-results-POSTengine-users-checkPhone" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-checkPhone"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-checkPhone"></code></pre>
</span>
<span id="execution-error-POSTengine-users-checkPhone" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-checkPhone"></code></pre>
</span>
<form id="form-POSTengine-users-checkPhone" data-method="POST"
      data-path="engine/users/checkPhone"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-checkPhone', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-checkPhone"
                    onclick="tryItOut('POSTengine-users-checkPhone');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-checkPhone"
                    onclick="cancelTryOut('POSTengine-users-checkPhone');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-checkPhone" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/checkPhone</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-checkPhone" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-checkPhone"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendLink">POST engine/messages/sendLink</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendLink">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendLink" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendLink"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendLink',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendLink'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendLink">
</span>
<span id="execution-results-POSTengine-messages-sendLink" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendLink"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendLink"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendLink" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendLink"></code></pre>
</span>
<form id="form-POSTengine-messages-sendLink" data-method="POST"
      data-path="engine/messages/sendLink"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendLink', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendLink"
                    onclick="tryItOut('POSTengine-messages-sendLink');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendLink"
                    onclick="cancelTryOut('POSTengine-messages-sendLink');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendLink" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendLink</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendLink" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendLink"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendLocation">POST engine/messages/sendLocation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendLocation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendLocation" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendLocation"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendLocation',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendLocation'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendLocation">
</span>
<span id="execution-results-POSTengine-messages-sendLocation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendLocation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendLocation"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendLocation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendLocation"></code></pre>
</span>
<form id="form-POSTengine-messages-sendLocation" data-method="POST"
      data-path="engine/messages/sendLocation"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendLocation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendLocation"
                    onclick="tryItOut('POSTengine-messages-sendLocation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendLocation"
                    onclick="cancelTryOut('POSTengine-messages-sendLocation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendLocation" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendLocation</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendLocation" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendLocation"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendContact">POST engine/messages/sendContact</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendContact">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendContact" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendContact"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendContact',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendContact'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendContact">
</span>
<span id="execution-results-POSTengine-messages-sendContact" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendContact"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendContact"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendContact" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendContact"></code></pre>
</span>
<form id="form-POSTengine-messages-sendContact" data-method="POST"
      data-path="engine/messages/sendContact"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendContact', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendContact"
                    onclick="tryItOut('POSTengine-messages-sendContact');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendContact"
                    onclick="cancelTryOut('POSTengine-messages-sendContact');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendContact" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendContact</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendContact" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendContact"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendDisappearingMessage">POST engine/messages/sendDisappearingMessage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendDisappearingMessage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendDisappearingMessage" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendDisappearingMessage"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendDisappearingMessage',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendDisappearingMessage'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendDisappearingMessage">
</span>
<span id="execution-results-POSTengine-messages-sendDisappearingMessage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendDisappearingMessage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendDisappearingMessage"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendDisappearingMessage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendDisappearingMessage"></code></pre>
</span>
<form id="form-POSTengine-messages-sendDisappearingMessage" data-method="POST"
      data-path="engine/messages/sendDisappearingMessage"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendDisappearingMessage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendDisappearingMessage"
                    onclick="tryItOut('POSTengine-messages-sendDisappearingMessage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendDisappearingMessage"
                    onclick="cancelTryOut('POSTengine-messages-sendDisappearingMessage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendDisappearingMessage" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendDisappearingMessage</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendDisappearingMessage" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendDisappearingMessage"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendMention">POST engine/messages/sendMention</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendMention">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendMention" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendMention"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendMention',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendMention'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendMention">
</span>
<span id="execution-results-POSTengine-messages-sendMention" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendMention"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendMention"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendMention" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendMention"></code></pre>
</span>
<form id="form-POSTengine-messages-sendMention" data-method="POST"
      data-path="engine/messages/sendMention"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendMention', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendMention"
                    onclick="tryItOut('POSTengine-messages-sendMention');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendMention"
                    onclick="cancelTryOut('POSTengine-messages-sendMention');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendMention" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendMention</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendMention" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendMention"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendReaction">POST engine/messages/sendReaction</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendReaction">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendReaction" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendReaction"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendReaction',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendReaction'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendReaction">
</span>
<span id="execution-results-POSTengine-messages-sendReaction" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendReaction"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendReaction"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendReaction" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendReaction"></code></pre>
</span>
<form id="form-POSTengine-messages-sendReaction" data-method="POST"
      data-path="engine/messages/sendReaction"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendReaction', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendReaction"
                    onclick="tryItOut('POSTengine-messages-sendReaction');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendReaction"
                    onclick="cancelTryOut('POSTengine-messages-sendReaction');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendReaction" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendReaction</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendReaction" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendReaction"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendButtons">POST engine/messages/sendButtons</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendButtons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendButtons" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendButtons"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendButtons',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendButtons'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendButtons">
</span>
<span id="execution-results-POSTengine-messages-sendButtons" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendButtons"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendButtons"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendButtons" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendButtons"></code></pre>
</span>
<form id="form-POSTengine-messages-sendButtons" data-method="POST"
      data-path="engine/messages/sendButtons"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendButtons', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendButtons"
                    onclick="tryItOut('POSTengine-messages-sendButtons');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendButtons"
                    onclick="cancelTryOut('POSTengine-messages-sendButtons');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendButtons" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendButtons</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendButtons" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendButtons"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendTemplates">POST engine/messages/sendTemplates</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendTemplates">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendTemplates" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendTemplates"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendTemplates',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendTemplates'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendTemplates">
</span>
<span id="execution-results-POSTengine-messages-sendTemplates" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendTemplates"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendTemplates"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendTemplates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendTemplates"></code></pre>
</span>
<form id="form-POSTengine-messages-sendTemplates" data-method="POST"
      data-path="engine/messages/sendTemplates"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendTemplates', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendTemplates"
                    onclick="tryItOut('POSTengine-messages-sendTemplates');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendTemplates"
                    onclick="cancelTryOut('POSTengine-messages-sendTemplates');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendTemplates" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendTemplates</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendTemplates" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendTemplates"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendList">POST engine/messages/sendList</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendList">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendList" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendList"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendList',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendList'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendList">
</span>
<span id="execution-results-POSTengine-messages-sendList" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendList"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendList"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendList" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendList"></code></pre>
</span>
<form id="form-POSTengine-messages-sendList" data-method="POST"
      data-path="engine/messages/sendList"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendList', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendList"
                    onclick="tryItOut('POSTengine-messages-sendList');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendList"
                    onclick="cancelTryOut('POSTengine-messages-sendList');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendList" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendList</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendList" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendList"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-forwardMessage">POST engine/messages/forwardMessage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-forwardMessage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/forwardMessage" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/forwardMessage"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/forwardMessage',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/forwardMessage'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-forwardMessage">
</span>
<span id="execution-results-POSTengine-messages-forwardMessage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-forwardMessage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-forwardMessage"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-forwardMessage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-forwardMessage"></code></pre>
</span>
<form id="form-POSTengine-messages-forwardMessage" data-method="POST"
      data-path="engine/messages/forwardMessage"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-forwardMessage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-forwardMessage"
                    onclick="tryItOut('POSTengine-messages-forwardMessage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-forwardMessage"
                    onclick="cancelTryOut('POSTengine-messages-forwardMessage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-forwardMessage" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/forwardMessage</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-forwardMessage" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-forwardMessage"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-deleteMessageForAll">POST engine/messages/deleteMessageForAll</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-deleteMessageForAll">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/deleteMessageForAll" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/deleteMessageForAll"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/deleteMessageForAll',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/deleteMessageForAll'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-deleteMessageForAll">
</span>
<span id="execution-results-POSTengine-messages-deleteMessageForAll" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-deleteMessageForAll"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-deleteMessageForAll"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-deleteMessageForAll" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-deleteMessageForAll"></code></pre>
</span>
<form id="form-POSTengine-messages-deleteMessageForAll" data-method="POST"
      data-path="engine/messages/deleteMessageForAll"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-deleteMessageForAll', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-deleteMessageForAll"
                    onclick="tryItOut('POSTengine-messages-deleteMessageForAll');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-deleteMessageForAll"
                    onclick="cancelTryOut('POSTengine-messages-deleteMessageForAll');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-deleteMessageForAll" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/deleteMessageForAll</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-deleteMessageForAll" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-deleteMessageForAll"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-deleteMessageForMe">POST engine/messages/deleteMessageForMe</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-deleteMessageForMe">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/deleteMessageForMe" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/deleteMessageForMe"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/deleteMessageForMe',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/deleteMessageForMe'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-deleteMessageForMe">
</span>
<span id="execution-results-POSTengine-messages-deleteMessageForMe" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-deleteMessageForMe"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-deleteMessageForMe"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-deleteMessageForMe" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-deleteMessageForMe"></code></pre>
</span>
<form id="form-POSTengine-messages-deleteMessageForMe" data-method="POST"
      data-path="engine/messages/deleteMessageForMe"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-deleteMessageForMe', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-deleteMessageForMe"
                    onclick="tryItOut('POSTengine-messages-deleteMessageForMe');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-deleteMessageForMe"
                    onclick="cancelTryOut('POSTengine-messages-deleteMessageForMe');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-deleteMessageForMe" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/deleteMessageForMe</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-deleteMessageForMe" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-deleteMessageForMe"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-repeatHook">POST engine/messages/repeatHook</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-repeatHook">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/repeatHook" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/repeatHook"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/repeatHook',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/repeatHook'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-repeatHook">
</span>
<span id="execution-results-POSTengine-messages-repeatHook" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-repeatHook"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-repeatHook"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-repeatHook" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-repeatHook"></code></pre>
</span>
<form id="form-POSTengine-messages-repeatHook" data-method="POST"
      data-path="engine/messages/repeatHook"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-repeatHook', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-repeatHook"
                    onclick="tryItOut('POSTengine-messages-repeatHook');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-repeatHook"
                    onclick="cancelTryOut('POSTengine-messages-repeatHook');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-repeatHook" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/repeatHook</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-repeatHook" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-repeatHook"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-starMessage">POST engine/messages/starMessage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-starMessage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/starMessage" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/starMessage"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/starMessage',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/starMessage'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-starMessage">
</span>
<span id="execution-results-POSTengine-messages-starMessage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-starMessage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-starMessage"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-starMessage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-starMessage"></code></pre>
</span>
<form id="form-POSTengine-messages-starMessage" data-method="POST"
      data-path="engine/messages/starMessage"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-starMessage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-starMessage"
                    onclick="tryItOut('POSTengine-messages-starMessage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-starMessage"
                    onclick="cancelTryOut('POSTengine-messages-starMessage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-starMessage" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/starMessage</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-starMessage" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-starMessage"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-unstarMessage">POST engine/messages/unstarMessage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-unstarMessage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/unstarMessage" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/unstarMessage"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/unstarMessage',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/unstarMessage'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-unstarMessage">
</span>
<span id="execution-results-POSTengine-messages-unstarMessage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-unstarMessage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-unstarMessage"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-unstarMessage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-unstarMessage"></code></pre>
</span>
<form id="form-POSTengine-messages-unstarMessage" data-method="POST"
      data-path="engine/messages/unstarMessage"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-unstarMessage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-unstarMessage"
                    onclick="tryItOut('POSTengine-messages-unstarMessage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-unstarMessage"
                    onclick="cancelTryOut('POSTengine-messages-unstarMessage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-unstarMessage" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/unstarMessage</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-unstarMessage" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-unstarMessage"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-getInviteCode">POST engine/groups/getInviteCode</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-getInviteCode">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/getInviteCode" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/getInviteCode"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/getInviteCode',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/getInviteCode'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-getInviteCode">
</span>
<span id="execution-results-POSTengine-groups-getInviteCode" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-getInviteCode"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-getInviteCode"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-getInviteCode" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-getInviteCode"></code></pre>
</span>
<form id="form-POSTengine-groups-getInviteCode" data-method="POST"
      data-path="engine/groups/getInviteCode"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-getInviteCode', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-getInviteCode"
                    onclick="tryItOut('POSTengine-groups-getInviteCode');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-getInviteCode"
                    onclick="cancelTryOut('POSTengine-groups-getInviteCode');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-getInviteCode" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/getInviteCode</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-getInviteCode" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-getInviteCode"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-leaveGroup">POST engine/groups/leaveGroup</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-leaveGroup">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/leaveGroup" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/leaveGroup"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/leaveGroup',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/leaveGroup'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-leaveGroup">
</span>
<span id="execution-results-POSTengine-groups-leaveGroup" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-leaveGroup"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-leaveGroup"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-leaveGroup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-leaveGroup"></code></pre>
</span>
<form id="form-POSTengine-groups-leaveGroup" data-method="POST"
      data-path="engine/groups/leaveGroup"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-leaveGroup', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-leaveGroup"
                    onclick="tryItOut('POSTengine-groups-leaveGroup');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-leaveGroup"
                    onclick="cancelTryOut('POSTengine-groups-leaveGroup');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-leaveGroup" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/leaveGroup</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-leaveGroup" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-leaveGroup"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-revokeInvite">POST engine/groups/revokeInvite</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-revokeInvite">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/revokeInvite" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/revokeInvite"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/revokeInvite',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/revokeInvite'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-revokeInvite">
</span>
<span id="execution-results-POSTengine-groups-revokeInvite" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-revokeInvite"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-revokeInvite"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-revokeInvite" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-revokeInvite"></code></pre>
</span>
<form id="form-POSTengine-groups-revokeInvite" data-method="POST"
      data-path="engine/groups/revokeInvite"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-revokeInvite', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-revokeInvite"
                    onclick="tryItOut('POSTengine-groups-revokeInvite');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-revokeInvite"
                    onclick="cancelTryOut('POSTengine-groups-revokeInvite');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-revokeInvite" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/revokeInvite</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-revokeInvite" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-revokeInvite"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-getInviteInfo">POST engine/groups/getInviteInfo</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-getInviteInfo">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/getInviteInfo" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/getInviteInfo"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/getInviteInfo',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/getInviteInfo'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-getInviteInfo">
</span>
<span id="execution-results-POSTengine-groups-getInviteInfo" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-getInviteInfo"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-getInviteInfo"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-getInviteInfo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-getInviteInfo"></code></pre>
</span>
<form id="form-POSTengine-groups-getInviteInfo" data-method="POST"
      data-path="engine/groups/getInviteInfo"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-getInviteInfo', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-getInviteInfo"
                    onclick="tryItOut('POSTengine-groups-getInviteInfo');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-getInviteInfo"
                    onclick="cancelTryOut('POSTengine-groups-getInviteInfo');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-getInviteInfo" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/getInviteInfo</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-getInviteInfo" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-getInviteInfo"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-acceptInvite">POST engine/groups/acceptInvite</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-acceptInvite">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/acceptInvite" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/acceptInvite"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/acceptInvite',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/acceptInvite'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-acceptInvite">
</span>
<span id="execution-results-POSTengine-groups-acceptInvite" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-acceptInvite"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-acceptInvite"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-acceptInvite" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-acceptInvite"></code></pre>
</span>
<form id="form-POSTengine-groups-acceptInvite" data-method="POST"
      data-path="engine/groups/acceptInvite"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-acceptInvite', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-acceptInvite"
                    onclick="tryItOut('POSTengine-groups-acceptInvite');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-acceptInvite"
                    onclick="cancelTryOut('POSTengine-groups-acceptInvite');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-acceptInvite" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/acceptInvite</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-acceptInvite" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-acceptInvite"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-joinGroup">POST engine/groups/joinGroup</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-joinGroup">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/joinGroup" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/joinGroup"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/joinGroup',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/joinGroup'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-joinGroup">
</span>
<span id="execution-results-POSTengine-groups-joinGroup" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-joinGroup"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-joinGroup"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-joinGroup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-joinGroup"></code></pre>
</span>
<form id="form-POSTengine-groups-joinGroup" data-method="POST"
      data-path="engine/groups/joinGroup"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-joinGroup', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-joinGroup"
                    onclick="tryItOut('POSTengine-groups-joinGroup');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-joinGroup"
                    onclick="cancelTryOut('POSTengine-groups-joinGroup');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-joinGroup" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/joinGroup</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-joinGroup" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-joinGroup"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-queues-getMessagesQueue">GET engine/queues/getMessagesQueue</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-queues-getMessagesQueue">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/queues/getMessagesQueue" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/queues/getMessagesQueue"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/queues/getMessagesQueue',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/queues/getMessagesQueue'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-queues-getMessagesQueue">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=44ux0BhaRfRM6QbmraswkJHx2Jvz9EnSfCLwSJWO; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-queues-getMessagesQueue" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-queues-getMessagesQueue"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-queues-getMessagesQueue"></code></pre>
</span>
<span id="execution-error-GETengine-queues-getMessagesQueue" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-queues-getMessagesQueue"></code></pre>
</span>
<form id="form-GETengine-queues-getMessagesQueue" data-method="GET"
      data-path="engine/queues/getMessagesQueue"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-queues-getMessagesQueue', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-queues-getMessagesQueue"
                    onclick="tryItOut('GETengine-queues-getMessagesQueue');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-queues-getMessagesQueue"
                    onclick="cancelTryOut('GETengine-queues-getMessagesQueue');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-queues-getMessagesQueue" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/queues/getMessagesQueue</code></b>
        </p>
                <p>
            <label id="auth-GETengine-queues-getMessagesQueue" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-queues-getMessagesQueue"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-demoteParticipants">POST engine/groups/demoteParticipants</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-demoteParticipants">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/demoteParticipants" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/demoteParticipants"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/demoteParticipants',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/demoteParticipants'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-demoteParticipants">
</span>
<span id="execution-results-POSTengine-groups-demoteParticipants" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-demoteParticipants"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-demoteParticipants"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-demoteParticipants" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-demoteParticipants"></code></pre>
</span>
<form id="form-POSTengine-groups-demoteParticipants" data-method="POST"
      data-path="engine/groups/demoteParticipants"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-demoteParticipants', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-demoteParticipants"
                    onclick="tryItOut('POSTengine-groups-demoteParticipants');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-demoteParticipants"
                    onclick="cancelTryOut('POSTengine-groups-demoteParticipants');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-demoteParticipants" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/demoteParticipants</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-demoteParticipants" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-demoteParticipants"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-promoteParticipants">POST engine/groups/promoteParticipants</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-promoteParticipants">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/promoteParticipants" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/promoteParticipants"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/promoteParticipants',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/promoteParticipants'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-promoteParticipants">
</span>
<span id="execution-results-POSTengine-groups-promoteParticipants" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-promoteParticipants"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-promoteParticipants"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-promoteParticipants" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-promoteParticipants"></code></pre>
</span>
<form id="form-POSTengine-groups-promoteParticipants" data-method="POST"
      data-path="engine/groups/promoteParticipants"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-promoteParticipants', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-promoteParticipants"
                    onclick="tryItOut('POSTengine-groups-promoteParticipants');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-promoteParticipants"
                    onclick="cancelTryOut('POSTengine-groups-promoteParticipants');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-promoteParticipants" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/promoteParticipants</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-promoteParticipants" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-promoteParticipants"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-removeParticipants">POST engine/groups/removeParticipants</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-removeParticipants">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/removeParticipants" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/removeParticipants"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/removeParticipants',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/removeParticipants'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-removeParticipants">
</span>
<span id="execution-results-POSTengine-groups-removeParticipants" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-removeParticipants"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-removeParticipants"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-removeParticipants" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-removeParticipants"></code></pre>
</span>
<form id="form-POSTengine-groups-removeParticipants" data-method="POST"
      data-path="engine/groups/removeParticipants"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-removeParticipants', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-removeParticipants"
                    onclick="tryItOut('POSTengine-groups-removeParticipants');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-removeParticipants"
                    onclick="cancelTryOut('POSTengine-groups-removeParticipants');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-removeParticipants" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/removeParticipants</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-removeParticipants" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-removeParticipants"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-addParticipants">POST engine/groups/addParticipants</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-addParticipants">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/addParticipants" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/addParticipants"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/addParticipants',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/addParticipants'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-addParticipants">
</span>
<span id="execution-results-POSTengine-groups-addParticipants" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-addParticipants"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-addParticipants"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-addParticipants" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-addParticipants"></code></pre>
</span>
<form id="form-POSTengine-groups-addParticipants" data-method="POST"
      data-path="engine/groups/addParticipants"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-addParticipants', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-addParticipants"
                    onclick="tryItOut('POSTengine-groups-addParticipants');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-addParticipants"
                    onclick="cancelTryOut('POSTengine-groups-addParticipants');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-addParticipants" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/addParticipants</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-addParticipants" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-addParticipants"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-getParticipants">POST engine/groups/getParticipants</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-getParticipants">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/getParticipants" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/getParticipants"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/getParticipants',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/getParticipants'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-getParticipants">
</span>
<span id="execution-results-POSTengine-groups-getParticipants" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-getParticipants"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-getParticipants"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-getParticipants" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-getParticipants"></code></pre>
</span>
<form id="form-POSTengine-groups-getParticipants" data-method="POST"
      data-path="engine/groups/getParticipants"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-getParticipants', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-getParticipants"
                    onclick="tryItOut('POSTengine-groups-getParticipants');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-getParticipants"
                    onclick="cancelTryOut('POSTengine-groups-getParticipants');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-getParticipants" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/getParticipants</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-getParticipants" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-getParticipants"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-users-getUserPicture">POST engine/users/getUserPicture</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-getUserPicture">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/getUserPicture" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/getUserPicture"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/users/getUserPicture',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/users/getUserPicture'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-users-getUserPicture">
</span>
<span id="execution-results-POSTengine-users-getUserPicture" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-getUserPicture"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-getUserPicture"></code></pre>
</span>
<span id="execution-error-POSTengine-users-getUserPicture" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-getUserPicture"></code></pre>
</span>
<form id="form-POSTengine-users-getUserPicture" data-method="POST"
      data-path="engine/users/getUserPicture"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-getUserPicture', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-getUserPicture"
                    onclick="tryItOut('POSTengine-users-getUserPicture');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-getUserPicture"
                    onclick="cancelTryOut('POSTengine-users-getUserPicture');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-getUserPicture" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/getUserPicture</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-getUserPicture" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-getUserPicture"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-updateDescription">POST engine/groups/updateDescription</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-updateDescription">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/updateDescription" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/updateDescription"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/updateDescription',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/updateDescription'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-updateDescription">
</span>
<span id="execution-results-POSTengine-groups-updateDescription" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-updateDescription"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-updateDescription"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-updateDescription" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-updateDescription"></code></pre>
</span>
<form id="form-POSTengine-groups-updateDescription" data-method="POST"
      data-path="engine/groups/updateDescription"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-updateDescription', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-updateDescription"
                    onclick="tryItOut('POSTengine-groups-updateDescription');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-updateDescription"
                    onclick="cancelTryOut('POSTengine-groups-updateDescription');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-updateDescription" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/updateDescription</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-updateDescription" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-updateDescription"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-renameGroup">POST engine/groups/renameGroup</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-renameGroup">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/renameGroup" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/renameGroup"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/renameGroup',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/renameGroup'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-renameGroup">
</span>
<span id="execution-results-POSTengine-groups-renameGroup" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-renameGroup"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-renameGroup"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-renameGroup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-renameGroup"></code></pre>
</span>
<form id="form-POSTengine-groups-renameGroup" data-method="POST"
      data-path="engine/groups/renameGroup"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-renameGroup', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-renameGroup"
                    onclick="tryItOut('POSTengine-groups-renameGroup');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-renameGroup"
                    onclick="cancelTryOut('POSTengine-groups-renameGroup');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-renameGroup" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/renameGroup</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-renameGroup" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-renameGroup"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-createGroup">POST engine/groups/createGroup</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-createGroup">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/createGroup" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/createGroup"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/createGroup',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/createGroup'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-createGroup">
</span>
<span id="execution-results-POSTengine-groups-createGroup" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-createGroup"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-createGroup"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-createGroup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-createGroup"></code></pre>
</span>
<form id="form-POSTengine-groups-createGroup" data-method="POST"
      data-path="engine/groups/createGroup"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-createGroup', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-createGroup"
                    onclick="tryItOut('POSTengine-groups-createGroup');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-createGroup"
                    onclick="cancelTryOut('POSTengine-groups-createGroup');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-createGroup" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/createGroup</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-createGroup" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-createGroup"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-groups">GET engine/groups</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-groups">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/groups" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/groups',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-groups">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=HoEXl8QzxPHuHniArpXpKMt1642RGXBh71aVQhDZ; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-groups" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-groups"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-groups"></code></pre>
</span>
<span id="execution-error-GETengine-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-groups"></code></pre>
</span>
<form id="form-GETengine-groups" data-method="GET"
      data-path="engine/groups"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-groups', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-groups"
                    onclick="tryItOut('GETengine-groups');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-groups"
                    onclick="cancelTryOut('GETengine-groups');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-groups" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/groups</code></b>
        </p>
                <p>
            <label id="auth-GETengine-groups" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-groups"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-recording">POST engine/chats/recording</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-recording">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/recording" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/recording"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/recording',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/recording'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-recording">
</span>
<span id="execution-results-POSTengine-chats-recording" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-recording"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-recording"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-recording" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-recording"></code></pre>
</span>
<form id="form-POSTengine-chats-recording" data-method="POST"
      data-path="engine/chats/recording"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-recording', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-recording"
                    onclick="tryItOut('POSTengine-chats-recording');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-recording"
                    onclick="cancelTryOut('POSTengine-chats-recording');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-recording" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/recording</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-recording" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-recording"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-typing">POST engine/chats/typing</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-typing">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/typing" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/typing"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/typing',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/typing'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-typing">
</span>
<span id="execution-results-POSTengine-chats-typing" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-typing"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-typing"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-typing" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-typing"></code></pre>
</span>
<form id="form-POSTengine-chats-typing" data-method="POST"
      data-path="engine/chats/typing"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-typing', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-typing"
                    onclick="tryItOut('POSTengine-chats-typing');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-typing"
                    onclick="cancelTryOut('POSTengine-chats-typing');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-typing" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/typing</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-typing" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-typing"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-groups-updateSetting">POST engine/groups/updateSetting</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-groups-updateSetting">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/groups/updateSetting" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/groups/updateSetting"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/groups/updateSetting',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/groups/updateSetting'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-groups-updateSetting">
</span>
<span id="execution-results-POSTengine-groups-updateSetting" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-groups-updateSetting"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-groups-updateSetting"></code></pre>
</span>
<span id="execution-error-POSTengine-groups-updateSetting" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-groups-updateSetting"></code></pre>
</span>
<form id="form-POSTengine-groups-updateSetting" data-method="POST"
      data-path="engine/groups/updateSetting"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-groups-updateSetting', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-groups-updateSetting"
                    onclick="tryItOut('POSTengine-groups-updateSetting');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-groups-updateSetting"
                    onclick="cancelTryOut('POSTengine-groups-updateSetting');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-groups-updateSetting" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/groups/updateSetting</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-groups-updateSetting" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-groups-updateSetting"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-sendCatalog">POST engine/business/sendCatalog</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-sendCatalog">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/sendCatalog" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/sendCatalog"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/sendCatalog',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/sendCatalog'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-sendCatalog">
</span>
<span id="execution-results-POSTengine-business-sendCatalog" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-sendCatalog"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-sendCatalog"></code></pre>
</span>
<span id="execution-error-POSTengine-business-sendCatalog" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-sendCatalog"></code></pre>
</span>
<form id="form-POSTengine-business-sendCatalog" data-method="POST"
      data-path="engine/business/sendCatalog"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-sendCatalog', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-sendCatalog"
                    onclick="tryItOut('POSTengine-business-sendCatalog');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-sendCatalog"
                    onclick="cancelTryOut('POSTengine-business-sendCatalog');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-sendCatalog" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/sendCatalog</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-sendCatalog" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-sendCatalog"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-users-blockList">GET engine/users/blockList</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-users-blockList">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/users/blockList" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/blockList"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/users/blockList',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/users/blockList'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-users-blockList">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=h3So5RQ8phXUrcjOf7RCG0uF9QL1rZam9WSCMFRC; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-users-blockList" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-users-blockList"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-users-blockList"></code></pre>
</span>
<span id="execution-error-GETengine-users-blockList" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-users-blockList"></code></pre>
</span>
<form id="form-GETengine-users-blockList" data-method="GET"
      data-path="engine/users/blockList"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-users-blockList', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-users-blockList"
                    onclick="tryItOut('GETengine-users-blockList');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-users-blockList"
                    onclick="cancelTryOut('GETengine-users-blockList');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-users-blockList" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/users/blockList</code></b>
        </p>
                <p>
            <label id="auth-GETengine-users-blockList" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-users-blockList"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-unlabelChat">POST engine/business/unlabelChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-unlabelChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/unlabelChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/unlabelChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/unlabelChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/unlabelChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-unlabelChat">
</span>
<span id="execution-results-POSTengine-business-unlabelChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-unlabelChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-unlabelChat"></code></pre>
</span>
<span id="execution-error-POSTengine-business-unlabelChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-unlabelChat"></code></pre>
</span>
<form id="form-POSTengine-business-unlabelChat" data-method="POST"
      data-path="engine/business/unlabelChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-unlabelChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-unlabelChat"
                    onclick="tryItOut('POSTengine-business-unlabelChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-unlabelChat"
                    onclick="cancelTryOut('POSTengine-business-unlabelChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-unlabelChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/unlabelChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-unlabelChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-unlabelChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-channels">GET engine/channels</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-channels">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/channels" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/channels"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/channels',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/channels'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-channels">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=5WRZaATg4ocsLG6mwK0xkv7veeT0pfhCZM3EfcuO; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-channels" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-channels"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-channels"></code></pre>
</span>
<span id="execution-error-GETengine-channels" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-channels"></code></pre>
</span>
<form id="form-GETengine-channels" data-method="GET"
      data-path="engine/channels"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-channels', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-channels"
                    onclick="tryItOut('GETengine-channels');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-channels"
                    onclick="cancelTryOut('GETengine-channels');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-channels" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/channels</code></b>
        </p>
                <p>
            <label id="auth-GETengine-channels" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-channels"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-replies-delete">POST engine/business/replies/delete</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-replies-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/replies/delete" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/replies/delete"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/replies/delete',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/replies/delete'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-replies-delete">
</span>
<span id="execution-results-POSTengine-business-replies-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-replies-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-replies-delete"></code></pre>
</span>
<span id="execution-error-POSTengine-business-replies-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-replies-delete"></code></pre>
</span>
<form id="form-POSTengine-business-replies-delete" data-method="POST"
      data-path="engine/business/replies/delete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-replies-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-replies-delete"
                    onclick="tryItOut('POSTengine-business-replies-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-replies-delete"
                    onclick="cancelTryOut('POSTengine-business-replies-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-replies-delete" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/replies/delete</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-replies-delete" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-replies-delete"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-replies-update">POST engine/business/replies/update</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-replies-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/replies/update" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/replies/update"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/replies/update',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/replies/update'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-replies-update">
</span>
<span id="execution-results-POSTengine-business-replies-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-replies-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-replies-update"></code></pre>
</span>
<span id="execution-error-POSTengine-business-replies-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-replies-update"></code></pre>
</span>
<form id="form-POSTengine-business-replies-update" data-method="POST"
      data-path="engine/business/replies/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-replies-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-replies-update"
                    onclick="tryItOut('POSTengine-business-replies-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-replies-update"
                    onclick="cancelTryOut('POSTengine-business-replies-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-replies-update" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/replies/update</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-replies-update" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-replies-update"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-replies-create">POST engine/business/replies/create</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-replies-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/replies/create" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/replies/create"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/replies/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/replies/create'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-replies-create">
</span>
<span id="execution-results-POSTengine-business-replies-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-replies-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-replies-create"></code></pre>
</span>
<span id="execution-error-POSTengine-business-replies-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-replies-create"></code></pre>
</span>
<form id="form-POSTengine-business-replies-create" data-method="POST"
      data-path="engine/business/replies/create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-replies-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-replies-create"
                    onclick="tryItOut('POSTengine-business-replies-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-replies-create"
                    onclick="cancelTryOut('POSTengine-business-replies-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-replies-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/replies/create</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-replies-create" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-replies-create"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-business-replies">GET engine/business/replies</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-business-replies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/business/replies" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/replies"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/business/replies',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/replies'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-business-replies">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=vDT32ypMFtYi0ggdoNIHd0TY763P0eC8Ur7YTd1Y; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-business-replies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-business-replies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-business-replies"></code></pre>
</span>
<span id="execution-error-GETengine-business-replies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-business-replies"></code></pre>
</span>
<form id="form-GETengine-business-replies" data-method="GET"
      data-path="engine/business/replies"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-business-replies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-business-replies"
                    onclick="tryItOut('GETengine-business-replies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-business-replies"
                    onclick="cancelTryOut('GETengine-business-replies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-business-replies" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/business/replies</code></b>
        </p>
                <p>
            <label id="auth-GETengine-business-replies" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-business-replies"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-labels-delete">POST engine/business/labels/delete</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-labels-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/labels/delete" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/labels/delete"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/labels/delete',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/labels/delete'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-labels-delete">
</span>
<span id="execution-results-POSTengine-business-labels-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-labels-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-labels-delete"></code></pre>
</span>
<span id="execution-error-POSTengine-business-labels-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-labels-delete"></code></pre>
</span>
<form id="form-POSTengine-business-labels-delete" data-method="POST"
      data-path="engine/business/labels/delete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-labels-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-labels-delete"
                    onclick="tryItOut('POSTengine-business-labels-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-labels-delete"
                    onclick="cancelTryOut('POSTengine-business-labels-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-labels-delete" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/labels/delete</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-labels-delete" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-labels-delete"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-labels-update">POST engine/business/labels/update</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-labels-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/labels/update" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/labels/update"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/labels/update',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/labels/update'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-labels-update">
</span>
<span id="execution-results-POSTengine-business-labels-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-labels-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-labels-update"></code></pre>
</span>
<span id="execution-error-POSTengine-business-labels-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-labels-update"></code></pre>
</span>
<form id="form-POSTengine-business-labels-update" data-method="POST"
      data-path="engine/business/labels/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-labels-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-labels-update"
                    onclick="tryItOut('POSTengine-business-labels-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-labels-update"
                    onclick="cancelTryOut('POSTengine-business-labels-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-labels-update" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/labels/update</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-labels-update" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-labels-update"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-labels-create">POST engine/business/labels/create</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-labels-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/labels/create" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/labels/create"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/labels/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/labels/create'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-labels-create">
</span>
<span id="execution-results-POSTengine-business-labels-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-labels-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-labels-create"></code></pre>
</span>
<span id="execution-error-POSTengine-business-labels-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-labels-create"></code></pre>
</span>
<form id="form-POSTengine-business-labels-create" data-method="POST"
      data-path="engine/business/labels/create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-labels-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-labels-create"
                    onclick="tryItOut('POSTengine-business-labels-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-labels-create"
                    onclick="cancelTryOut('POSTengine-business-labels-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-labels-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/labels/create</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-labels-create" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-labels-create"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-unlabelMessage">POST engine/business/unlabelMessage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-unlabelMessage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/unlabelMessage" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/unlabelMessage"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/unlabelMessage',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/unlabelMessage'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-unlabelMessage">
</span>
<span id="execution-results-POSTengine-business-unlabelMessage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-unlabelMessage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-unlabelMessage"></code></pre>
</span>
<span id="execution-error-POSTengine-business-unlabelMessage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-unlabelMessage"></code></pre>
</span>
<form id="form-POSTengine-business-unlabelMessage" data-method="POST"
      data-path="engine/business/unlabelMessage"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-unlabelMessage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-unlabelMessage"
                    onclick="tryItOut('POSTengine-business-unlabelMessage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-unlabelMessage"
                    onclick="cancelTryOut('POSTengine-business-unlabelMessage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-unlabelMessage" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/unlabelMessage</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-unlabelMessage" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-unlabelMessage"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-labelMessage">POST engine/business/labelMessage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-labelMessage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/labelMessage" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/labelMessage"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/labelMessage',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/labelMessage'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-labelMessage">
</span>
<span id="execution-results-POSTengine-business-labelMessage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-labelMessage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-labelMessage"></code></pre>
</span>
<span id="execution-error-POSTengine-business-labelMessage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-labelMessage"></code></pre>
</span>
<form id="form-POSTengine-business-labelMessage" data-method="POST"
      data-path="engine/business/labelMessage"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-labelMessage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-labelMessage"
                    onclick="tryItOut('POSTengine-business-labelMessage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-labelMessage"
                    onclick="cancelTryOut('POSTengine-business-labelMessage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-labelMessage" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/labelMessage</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-labelMessage" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-labelMessage"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-labelChat">POST engine/business/labelChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-labelChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/labelChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/labelChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/labelChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/labelChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-labelChat">
</span>
<span id="execution-results-POSTengine-business-labelChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-labelChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-labelChat"></code></pre>
</span>
<span id="execution-error-POSTengine-business-labelChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-labelChat"></code></pre>
</span>
<form id="form-POSTengine-business-labelChat" data-method="POST"
      data-path="engine/business/labelChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-labelChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-labelChat"
                    onclick="tryItOut('POSTengine-business-labelChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-labelChat"
                    onclick="cancelTryOut('POSTengine-business-labelChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-labelChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/labelChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-labelChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-labelChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-users-rejectCall">POST engine/users/rejectCall</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-rejectCall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/rejectCall" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/rejectCall"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/users/rejectCall',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/users/rejectCall'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-users-rejectCall">
</span>
<span id="execution-results-POSTengine-users-rejectCall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-rejectCall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-rejectCall"></code></pre>
</span>
<span id="execution-error-POSTengine-users-rejectCall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-rejectCall"></code></pre>
</span>
<form id="form-POSTengine-users-rejectCall" data-method="POST"
      data-path="engine/users/rejectCall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-rejectCall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-rejectCall"
                    onclick="tryItOut('POSTengine-users-rejectCall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-rejectCall"
                    onclick="cancelTryOut('POSTengine-users-rejectCall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-rejectCall" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/rejectCall</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-rejectCall" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-rejectCall"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-business-labels">GET engine/business/labels</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-business-labels">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/business/labels" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/labels"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/business/labels',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/labels'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-business-labels">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=yBEXZc5I2t8QOjFLVs2TKqhUJce5GGlNZ5Wd19Wg; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-business-labels" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-business-labels"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-business-labels"></code></pre>
</span>
<span id="execution-error-GETengine-business-labels" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-business-labels"></code></pre>
</span>
<form id="form-GETengine-business-labels" data-method="GET"
      data-path="engine/business/labels"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-business-labels', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-business-labels"
                    onclick="tryItOut('GETengine-business-labels');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-business-labels"
                    onclick="cancelTryOut('GETengine-business-labels');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-business-labels" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/business/labels</code></b>
        </p>
                <p>
            <label id="auth-GETengine-business-labels" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-business-labels"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-muteChat">POST engine/chats/muteChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-muteChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/muteChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/muteChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/muteChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/muteChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-muteChat">
</span>
<span id="execution-results-POSTengine-chats-muteChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-muteChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-muteChat"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-muteChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-muteChat"></code></pre>
</span>
<form id="form-POSTengine-chats-muteChat" data-method="POST"
      data-path="engine/chats/muteChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-muteChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-muteChat"
                    onclick="tryItOut('POSTengine-chats-muteChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-muteChat"
                    onclick="cancelTryOut('POSTengine-chats-muteChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-muteChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/muteChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-muteChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-muteChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-collections">POST engine/business/collections</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-collections">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/collections" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/collections"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/collections',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/collections'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-collections">
</span>
<span id="execution-results-POSTengine-business-collections" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-collections"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-collections"></code></pre>
</span>
<span id="execution-error-POSTengine-business-collections" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-collections"></code></pre>
</span>
<form id="form-POSTengine-business-collections" data-method="POST"
      data-path="engine/business/collections"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-collections', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-collections"
                    onclick="tryItOut('POSTengine-business-collections');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-collections"
                    onclick="cancelTryOut('POSTengine-business-collections');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-collections" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/collections</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-collections" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-collections"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-getOrder">POST engine/business/getOrder</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-getOrder">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/getOrder" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/getOrder"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/getOrder',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/getOrder'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-getOrder">
</span>
<span id="execution-results-POSTengine-business-getOrder" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-getOrder"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-getOrder"></code></pre>
</span>
<span id="execution-error-POSTengine-business-getOrder" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-getOrder"></code></pre>
</span>
<form id="form-POSTengine-business-getOrder" data-method="POST"
      data-path="engine/business/getOrder"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-getOrder', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-getOrder"
                    onclick="tryItOut('POSTengine-business-getOrder');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-getOrder"
                    onclick="cancelTryOut('POSTengine-business-getOrder');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-getOrder" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/getOrder</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-getOrder" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-getOrder"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-sendProduct">POST engine/business/sendProduct</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-sendProduct">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/sendProduct" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/sendProduct"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/sendProduct',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/sendProduct'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-sendProduct">
</span>
<span id="execution-results-POSTengine-business-sendProduct" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-sendProduct"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-sendProduct"></code></pre>
</span>
<span id="execution-error-POSTengine-business-sendProduct" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-sendProduct"></code></pre>
</span>
<form id="form-POSTengine-business-sendProduct" data-method="POST"
      data-path="engine/business/sendProduct"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-sendProduct', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-sendProduct"
                    onclick="tryItOut('POSTengine-business-sendProduct');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-sendProduct"
                    onclick="cancelTryOut('POSTengine-business-sendProduct');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-sendProduct" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/sendProduct</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-sendProduct" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-sendProduct"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-products-delete">POST engine/business/products/delete</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-products-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/products/delete" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/products/delete"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/products/delete',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/products/delete'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-products-delete">
</span>
<span id="execution-results-POSTengine-business-products-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-products-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-products-delete"></code></pre>
</span>
<span id="execution-error-POSTengine-business-products-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-products-delete"></code></pre>
</span>
<form id="form-POSTengine-business-products-delete" data-method="POST"
      data-path="engine/business/products/delete"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-products-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-products-delete"
                    onclick="tryItOut('POSTengine-business-products-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-products-delete"
                    onclick="cancelTryOut('POSTengine-business-products-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-products-delete" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/products/delete</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-products-delete" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-products-delete"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-products-update">POST engine/business/products/update</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-products-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/products/update" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/products/update"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/products/update',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/products/update'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-products-update">
</span>
<span id="execution-results-POSTengine-business-products-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-products-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-products-update"></code></pre>
</span>
<span id="execution-error-POSTengine-business-products-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-products-update"></code></pre>
</span>
<form id="form-POSTengine-business-products-update" data-method="POST"
      data-path="engine/business/products/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-products-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-products-update"
                    onclick="tryItOut('POSTengine-business-products-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-products-update"
                    onclick="cancelTryOut('POSTengine-business-products-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-products-update" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/products/update</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-products-update" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-products-update"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-products-create">POST engine/business/products/create</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-products-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/products/create" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/products/create"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/products/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/products/create'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-products-create">
</span>
<span id="execution-results-POSTengine-business-products-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-products-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-products-create"></code></pre>
</span>
<span id="execution-error-POSTengine-business-products-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-products-create"></code></pre>
</span>
<form id="form-POSTengine-business-products-create" data-method="POST"
      data-path="engine/business/products/create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-products-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-products-create"
                    onclick="tryItOut('POSTengine-business-products-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-products-create"
                    onclick="cancelTryOut('POSTengine-business-products-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-products-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/products/create</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-products-create" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-products-create"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-products">POST engine/business/products</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/products" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/products"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/products',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/products'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-products">
</span>
<span id="execution-results-POSTengine-business-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-products"></code></pre>
</span>
<span id="execution-error-POSTengine-business-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-products"></code></pre>
</span>
<form id="form-POSTengine-business-products" data-method="POST"
      data-path="engine/business/products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-products"
                    onclick="tryItOut('POSTengine-business-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-products"
                    onclick="cancelTryOut('POSTengine-business-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-products" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/products</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-products" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-products"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-business-getBusinessProfile">POST engine/business/getBusinessProfile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-business-getBusinessProfile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/business/getBusinessProfile" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/business/getBusinessProfile"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/business/getBusinessProfile',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/business/getBusinessProfile'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-business-getBusinessProfile">
</span>
<span id="execution-results-POSTengine-business-getBusinessProfile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-business-getBusinessProfile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-business-getBusinessProfile"></code></pre>
</span>
<span id="execution-error-POSTengine-business-getBusinessProfile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-business-getBusinessProfile"></code></pre>
</span>
<form id="form-POSTengine-business-getBusinessProfile" data-method="POST"
      data-path="engine/business/getBusinessProfile"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-business-getBusinessProfile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-business-getBusinessProfile"
                    onclick="tryItOut('POSTengine-business-getBusinessProfile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-business-getBusinessProfile"
                    onclick="cancelTryOut('POSTengine-business-getBusinessProfile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-business-getBusinessProfile" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/business/getBusinessProfile</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-business-getBusinessProfile" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-business-getBusinessProfile"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-unmuteChat">POST engine/chats/unmuteChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-unmuteChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/unmuteChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/unmuteChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/unmuteChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/unmuteChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-unmuteChat">
</span>
<span id="execution-results-POSTengine-chats-unmuteChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-unmuteChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-unmuteChat"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-unmuteChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-unmuteChat"></code></pre>
</span>
<form id="form-POSTengine-chats-unmuteChat" data-method="POST"
      data-path="engine/chats/unmuteChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-unmuteChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-unmuteChat"
                    onclick="tryItOut('POSTengine-chats-unmuteChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-unmuteChat"
                    onclick="cancelTryOut('POSTengine-chats-unmuteChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-unmuteChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/unmuteChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-unmuteChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-unmuteChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-linkBulk">POST engine/messages/linkBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-linkBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/linkBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/linkBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/linkBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/linkBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-linkBulk">
</span>
<span id="execution-results-POSTengine-messages-linkBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-linkBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-linkBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-linkBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-linkBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-linkBulk" data-method="POST"
      data-path="engine/messages/linkBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-linkBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-linkBulk"
                    onclick="tryItOut('POSTengine-messages-linkBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-linkBulk"
                    onclick="cancelTryOut('POSTengine-messages-linkBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-linkBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/linkBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-linkBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-linkBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-unpinChat">POST engine/chats/unpinChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-unpinChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/unpinChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/unpinChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/unpinChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/unpinChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-unpinChat">
</span>
<span id="execution-results-POSTengine-chats-unpinChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-unpinChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-unpinChat"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-unpinChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-unpinChat"></code></pre>
</span>
<form id="form-POSTengine-chats-unpinChat" data-method="POST"
      data-path="engine/chats/unpinChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-unpinChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-unpinChat"
                    onclick="tryItOut('POSTengine-chats-unpinChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-unpinChat"
                    onclick="cancelTryOut('POSTengine-chats-unpinChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-unpinChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/unpinChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-unpinChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-unpinChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-fileReply">POST engine/messages/fileReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-fileReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/fileReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/fileReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/fileReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/fileReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-fileReply">
</span>
<span id="execution-results-POSTengine-messages-fileReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-fileReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-fileReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-fileReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-fileReply"></code></pre>
</span>
<form id="form-POSTengine-messages-fileReply" data-method="POST"
      data-path="engine/messages/fileReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-fileReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-fileReply"
                    onclick="tryItOut('POSTengine-messages-fileReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-fileReply"
                    onclick="cancelTryOut('POSTengine-messages-fileReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-fileReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/fileReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-fileReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-fileReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-listReply">POST engine/messages/listReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-listReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/listReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/listReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/listReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/listReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-listReply">
</span>
<span id="execution-results-POSTengine-messages-listReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-listReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-listReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-listReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-listReply"></code></pre>
</span>
<form id="form-POSTengine-messages-listReply" data-method="POST"
      data-path="engine/messages/listReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-listReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-listReply"
                    onclick="tryItOut('POSTengine-messages-listReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-listReply"
                    onclick="cancelTryOut('POSTengine-messages-listReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-listReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/listReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-listReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-listReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-templateReply">POST engine/messages/templateReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-templateReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/templateReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/templateReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/templateReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/templateReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-templateReply">
</span>
<span id="execution-results-POSTengine-messages-templateReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-templateReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-templateReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-templateReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-templateReply"></code></pre>
</span>
<form id="form-POSTengine-messages-templateReply" data-method="POST"
      data-path="engine/messages/templateReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-templateReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-templateReply"
                    onclick="tryItOut('POSTengine-messages-templateReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-templateReply"
                    onclick="cancelTryOut('POSTengine-messages-templateReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-templateReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/templateReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-templateReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-templateReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-buttonsReply">POST engine/messages/buttonsReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-buttonsReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/buttonsReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/buttonsReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/buttonsReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/buttonsReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-buttonsReply">
</span>
<span id="execution-results-POSTengine-messages-buttonsReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-buttonsReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-buttonsReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-buttonsReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-buttonsReply"></code></pre>
</span>
<form id="form-POSTengine-messages-buttonsReply" data-method="POST"
      data-path="engine/messages/buttonsReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-buttonsReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-buttonsReply"
                    onclick="tryItOut('POSTengine-messages-buttonsReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-buttonsReply"
                    onclick="cancelTryOut('POSTengine-messages-buttonsReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-buttonsReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/buttonsReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-buttonsReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-buttonsReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-reactionReply">POST engine/messages/reactionReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-reactionReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/reactionReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/reactionReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/reactionReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/reactionReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-reactionReply">
</span>
<span id="execution-results-POSTengine-messages-reactionReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-reactionReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-reactionReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-reactionReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-reactionReply"></code></pre>
</span>
<form id="form-POSTengine-messages-reactionReply" data-method="POST"
      data-path="engine/messages/reactionReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-reactionReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-reactionReply"
                    onclick="tryItOut('POSTengine-messages-reactionReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-reactionReply"
                    onclick="cancelTryOut('POSTengine-messages-reactionReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-reactionReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/reactionReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-reactionReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-reactionReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-mentionReply">POST engine/messages/mentionReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-mentionReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/mentionReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/mentionReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/mentionReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/mentionReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-mentionReply">
</span>
<span id="execution-results-POSTengine-messages-mentionReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-mentionReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-mentionReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-mentionReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-mentionReply"></code></pre>
</span>
<form id="form-POSTengine-messages-mentionReply" data-method="POST"
      data-path="engine/messages/mentionReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-mentionReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-mentionReply"
                    onclick="tryItOut('POSTengine-messages-mentionReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-mentionReply"
                    onclick="cancelTryOut('POSTengine-messages-mentionReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-mentionReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/mentionReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-mentionReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-mentionReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-disappearingReply">POST engine/messages/disappearingReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-disappearingReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/disappearingReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/disappearingReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/disappearingReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/disappearingReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-disappearingReply">
</span>
<span id="execution-results-POSTengine-messages-disappearingReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-disappearingReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-disappearingReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-disappearingReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-disappearingReply"></code></pre>
</span>
<form id="form-POSTengine-messages-disappearingReply" data-method="POST"
      data-path="engine/messages/disappearingReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-disappearingReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-disappearingReply"
                    onclick="tryItOut('POSTengine-messages-disappearingReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-disappearingReply"
                    onclick="cancelTryOut('POSTengine-messages-disappearingReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-disappearingReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/disappearingReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-disappearingReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-disappearingReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-contactReply">POST engine/messages/contactReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-contactReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/contactReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/contactReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/contactReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/contactReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-contactReply">
</span>
<span id="execution-results-POSTengine-messages-contactReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-contactReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-contactReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-contactReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-contactReply"></code></pre>
</span>
<form id="form-POSTengine-messages-contactReply" data-method="POST"
      data-path="engine/messages/contactReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-contactReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-contactReply"
                    onclick="tryItOut('POSTengine-messages-contactReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-contactReply"
                    onclick="cancelTryOut('POSTengine-messages-contactReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-contactReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/contactReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-contactReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-contactReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-locationReply">POST engine/messages/locationReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-locationReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/locationReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/locationReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/locationReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/locationReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-locationReply">
</span>
<span id="execution-results-POSTengine-messages-locationReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-locationReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-locationReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-locationReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-locationReply"></code></pre>
</span>
<form id="form-POSTengine-messages-locationReply" data-method="POST"
      data-path="engine/messages/locationReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-locationReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-locationReply"
                    onclick="tryItOut('POSTengine-messages-locationReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-locationReply"
                    onclick="cancelTryOut('POSTengine-messages-locationReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-locationReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/locationReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-locationReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-locationReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-gifReply">POST engine/messages/gifReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-gifReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/gifReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/gifReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/gifReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/gifReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-gifReply">
</span>
<span id="execution-results-POSTengine-messages-gifReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-gifReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-gifReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-gifReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-gifReply"></code></pre>
</span>
<form id="form-POSTengine-messages-gifReply" data-method="POST"
      data-path="engine/messages/gifReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-gifReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-gifReply"
                    onclick="tryItOut('POSTengine-messages-gifReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-gifReply"
                    onclick="cancelTryOut('POSTengine-messages-gifReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-gifReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/gifReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-gifReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-gifReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-stickerReply">POST engine/messages/stickerReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-stickerReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/stickerReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/stickerReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/stickerReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/stickerReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-stickerReply">
</span>
<span id="execution-results-POSTengine-messages-stickerReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-stickerReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-stickerReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-stickerReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-stickerReply"></code></pre>
</span>
<form id="form-POSTengine-messages-stickerReply" data-method="POST"
      data-path="engine/messages/stickerReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-stickerReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-stickerReply"
                    onclick="tryItOut('POSTengine-messages-stickerReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-stickerReply"
                    onclick="cancelTryOut('POSTengine-messages-stickerReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-stickerReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/stickerReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-stickerReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-stickerReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-audioReply">POST engine/messages/audioReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-audioReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/audioReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/audioReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/audioReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/audioReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-audioReply">
</span>
<span id="execution-results-POSTengine-messages-audioReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-audioReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-audioReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-audioReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-audioReply"></code></pre>
</span>
<form id="form-POSTengine-messages-audioReply" data-method="POST"
      data-path="engine/messages/audioReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-audioReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-audioReply"
                    onclick="tryItOut('POSTengine-messages-audioReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-audioReply"
                    onclick="cancelTryOut('POSTengine-messages-audioReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-audioReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/audioReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-audioReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-audioReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-groupInvitationReply">POST engine/messages/groupInvitationReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-groupInvitationReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/groupInvitationReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/groupInvitationReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/groupInvitationReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/groupInvitationReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-groupInvitationReply">
</span>
<span id="execution-results-POSTengine-messages-groupInvitationReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-groupInvitationReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-groupInvitationReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-groupInvitationReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-groupInvitationReply"></code></pre>
</span>
<form id="form-POSTengine-messages-groupInvitationReply" data-method="POST"
      data-path="engine/messages/groupInvitationReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-groupInvitationReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-groupInvitationReply"
                    onclick="tryItOut('POSTengine-messages-groupInvitationReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-groupInvitationReply"
                    onclick="cancelTryOut('POSTengine-messages-groupInvitationReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-groupInvitationReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/groupInvitationReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-groupInvitationReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-groupInvitationReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-videoReply">POST engine/messages/videoReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-videoReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/videoReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/videoReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/videoReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/videoReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-videoReply">
</span>
<span id="execution-results-POSTengine-messages-videoReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-videoReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-videoReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-videoReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-videoReply"></code></pre>
</span>
<form id="form-POSTengine-messages-videoReply" data-method="POST"
      data-path="engine/messages/videoReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-videoReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-videoReply"
                    onclick="tryItOut('POSTengine-messages-videoReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-videoReply"
                    onclick="cancelTryOut('POSTengine-messages-videoReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-videoReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/videoReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-videoReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-videoReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-imageReply">POST engine/messages/imageReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-imageReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/imageReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/imageReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/imageReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/imageReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-imageReply">
</span>
<span id="execution-results-POSTengine-messages-imageReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-imageReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-imageReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-imageReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-imageReply"></code></pre>
</span>
<form id="form-POSTengine-messages-imageReply" data-method="POST"
      data-path="engine/messages/imageReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-imageReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-imageReply"
                    onclick="tryItOut('POSTengine-messages-imageReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-imageReply"
                    onclick="cancelTryOut('POSTengine-messages-imageReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-imageReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/imageReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-imageReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-imageReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-textReply">POST engine/messages/textReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-textReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/textReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/textReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/textReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/textReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-textReply">
</span>
<span id="execution-results-POSTengine-messages-textReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-textReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-textReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-textReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-textReply"></code></pre>
</span>
<form id="form-POSTengine-messages-textReply" data-method="POST"
      data-path="engine/messages/textReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-textReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-textReply"
                    onclick="tryItOut('POSTengine-messages-textReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-textReply"
                    onclick="cancelTryOut('POSTengine-messages-textReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-textReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/textReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-textReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-textReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-sendGroupInvitation">POST engine/messages/sendGroupInvitation</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendGroupInvitation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendGroupInvitation" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendGroupInvitation"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/sendGroupInvitation',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/sendGroupInvitation'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-sendGroupInvitation">
</span>
<span id="execution-results-POSTengine-messages-sendGroupInvitation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendGroupInvitation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendGroupInvitation"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendGroupInvitation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendGroupInvitation"></code></pre>
</span>
<form id="form-POSTengine-messages-sendGroupInvitation" data-method="POST"
      data-path="engine/messages/sendGroupInvitation"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendGroupInvitation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendGroupInvitation"
                    onclick="tryItOut('POSTengine-messages-sendGroupInvitation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendGroupInvitation"
                    onclick="cancelTryOut('POSTengine-messages-sendGroupInvitation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendGroupInvitation" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendGroupInvitation</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendGroupInvitation" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendGroupInvitation"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-messages">GET engine/messages</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-messages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/messages" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/messages',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-messages">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=2g7bbl0OwOSXS3AbAIu3gIawdUHui9dinAAZTdg1; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-messages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-messages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-messages"></code></pre>
</span>
<span id="execution-error-GETengine-messages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-messages"></code></pre>
</span>
<form id="form-GETengine-messages" data-method="GET"
      data-path="engine/messages"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-messages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-messages"
                    onclick="tryItOut('GETengine-messages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-messages"
                    onclick="cancelTryOut('GETengine-messages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-messages" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/messages</code></b>
        </p>
                <p>
            <label id="auth-GETengine-messages" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-messages"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-profiles-updateStatus">POST engine/profiles/updateStatus</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-profiles-updateStatus">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/profiles/updateStatus" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/profiles/updateStatus"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/profiles/updateStatus',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/profiles/updateStatus'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-profiles-updateStatus">
</span>
<span id="execution-results-POSTengine-profiles-updateStatus" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-profiles-updateStatus"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-profiles-updateStatus"></code></pre>
</span>
<span id="execution-error-POSTengine-profiles-updateStatus" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-profiles-updateStatus"></code></pre>
</span>
<form id="form-POSTengine-profiles-updateStatus" data-method="POST"
      data-path="engine/profiles/updateStatus"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-profiles-updateStatus', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-profiles-updateStatus"
                    onclick="tryItOut('POSTengine-profiles-updateStatus');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-profiles-updateStatus"
                    onclick="cancelTryOut('POSTengine-profiles-updateStatus');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-profiles-updateStatus" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/profiles/updateStatus</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-profiles-updateStatus" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-profiles-updateStatus"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-profiles-updateName">POST engine/profiles/updateName</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-profiles-updateName">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/profiles/updateName" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/profiles/updateName"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/profiles/updateName',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/profiles/updateName'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-profiles-updateName">
</span>
<span id="execution-results-POSTengine-profiles-updateName" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-profiles-updateName"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-profiles-updateName"></code></pre>
</span>
<span id="execution-error-POSTengine-profiles-updateName" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-profiles-updateName"></code></pre>
</span>
<form id="form-POSTengine-profiles-updateName" data-method="POST"
      data-path="engine/profiles/updateName"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-profiles-updateName', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-profiles-updateName"
                    onclick="tryItOut('POSTengine-profiles-updateName');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-profiles-updateName"
                    onclick="cancelTryOut('POSTengine-profiles-updateName');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-profiles-updateName" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/profiles/updateName</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-profiles-updateName" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-profiles-updateName"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-profiles-updatePresence">POST engine/profiles/updatePresence</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-profiles-updatePresence">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/profiles/updatePresence" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/profiles/updatePresence"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/profiles/updatePresence',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/profiles/updatePresence'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-profiles-updatePresence">
</span>
<span id="execution-results-POSTengine-profiles-updatePresence" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-profiles-updatePresence"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-profiles-updatePresence"></code></pre>
</span>
<span id="execution-error-POSTengine-profiles-updatePresence" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-profiles-updatePresence"></code></pre>
</span>
<form id="form-POSTengine-profiles-updatePresence" data-method="POST"
      data-path="engine/profiles/updatePresence"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-profiles-updatePresence', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-profiles-updatePresence"
                    onclick="tryItOut('POSTengine-profiles-updatePresence');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-profiles-updatePresence"
                    onclick="cancelTryOut('POSTengine-profiles-updatePresence');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-profiles-updatePresence" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/profiles/updatePresence</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-profiles-updatePresence" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-profiles-updatePresence"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-profiles-updateProfilePicture">POST engine/profiles/updateProfilePicture</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-profiles-updateProfilePicture">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/profiles/updateProfilePicture" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/profiles/updateProfilePicture"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/profiles/updateProfilePicture',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/profiles/updateProfilePicture'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-profiles-updateProfilePicture">
</span>
<span id="execution-results-POSTengine-profiles-updateProfilePicture" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-profiles-updateProfilePicture"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-profiles-updateProfilePicture"></code></pre>
</span>
<span id="execution-error-POSTengine-profiles-updateProfilePicture" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-profiles-updateProfilePicture"></code></pre>
</span>
<form id="form-POSTengine-profiles-updateProfilePicture" data-method="POST"
      data-path="engine/profiles/updateProfilePicture"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-profiles-updateProfilePicture', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-profiles-updateProfilePicture"
                    onclick="tryItOut('POSTengine-profiles-updateProfilePicture');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-profiles-updateProfilePicture"
                    onclick="cancelTryOut('POSTengine-profiles-updateProfilePicture');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-profiles-updateProfilePicture" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/profiles/updateProfilePicture</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-profiles-updateProfilePicture" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-profiles-updateProfilePicture"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-profiles-me">GET engine/profiles/me</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-profiles-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/profiles/me" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/profiles/me"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/profiles/me',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/profiles/me'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-profiles-me">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=dyaVCIh1cPhXx9bGeHeQXq7YWf2qL5b3aqaWWFOn; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-profiles-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-profiles-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-profiles-me"></code></pre>
</span>
<span id="execution-error-GETengine-profiles-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-profiles-me"></code></pre>
</span>
<form id="form-GETengine-profiles-me" data-method="GET"
      data-path="engine/profiles/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-profiles-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-profiles-me"
                    onclick="tryItOut('GETengine-profiles-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-profiles-me"
                    onclick="cancelTryOut('GETengine-profiles-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-profiles-me" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/profiles/me</code></b>
        </p>
                <p>
            <label id="auth-GETengine-profiles-me" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-profiles-me"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-linkReply">POST engine/messages/linkReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-linkReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/linkReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/linkReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/linkReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/linkReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-linkReply">
</span>
<span id="execution-results-POSTengine-messages-linkReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-linkReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-linkReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-linkReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-linkReply"></code></pre>
</span>
<form id="form-POSTengine-messages-linkReply" data-method="POST"
      data-path="engine/messages/linkReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-linkReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-linkReply"
                    onclick="tryItOut('POSTengine-messages-linkReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-linkReply"
                    onclick="cancelTryOut('POSTengine-messages-linkReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-linkReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/linkReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-linkReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-linkReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-productReply">POST engine/messages/productReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-productReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/productReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/productReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/productReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/productReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-productReply">
</span>
<span id="execution-results-POSTengine-messages-productReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-productReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-productReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-productReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-productReply"></code></pre>
</span>
<form id="form-POSTengine-messages-productReply" data-method="POST"
      data-path="engine/messages/productReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-productReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-productReply"
                    onclick="tryItOut('POSTengine-messages-productReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-productReply"
                    onclick="cancelTryOut('POSTengine-messages-productReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-productReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/productReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-productReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-productReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-pinChat">POST engine/chats/pinChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-pinChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/pinChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/pinChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/pinChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/pinChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-pinChat">
</span>
<span id="execution-results-POSTengine-chats-pinChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-pinChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-pinChat"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-pinChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-pinChat"></code></pre>
</span>
<form id="form-POSTengine-chats-pinChat" data-method="POST"
      data-path="engine/chats/pinChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-pinChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-pinChat"
                    onclick="tryItOut('POSTengine-chats-pinChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-pinChat"
                    onclick="cancelTryOut('POSTengine-chats-pinChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-pinChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/pinChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-pinChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-pinChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-listBulk">POST engine/messages/listBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-listBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/listBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/listBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/listBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/listBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-listBulk">
</span>
<span id="execution-results-POSTengine-messages-listBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-listBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-listBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-listBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-listBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-listBulk" data-method="POST"
      data-path="engine/messages/listBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-listBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-listBulk"
                    onclick="tryItOut('POSTengine-messages-listBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-listBulk"
                    onclick="cancelTryOut('POSTengine-messages-listBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-listBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/listBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-listBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-listBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-unarchiveChat">POST engine/chats/unarchiveChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-unarchiveChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/unarchiveChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/unarchiveChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/unarchiveChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/unarchiveChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-unarchiveChat">
</span>
<span id="execution-results-POSTengine-chats-unarchiveChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-unarchiveChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-unarchiveChat"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-unarchiveChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-unarchiveChat"></code></pre>
</span>
<form id="form-POSTengine-chats-unarchiveChat" data-method="POST"
      data-path="engine/chats/unarchiveChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-unarchiveChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-unarchiveChat"
                    onclick="tryItOut('POSTengine-chats-unarchiveChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-unarchiveChat"
                    onclick="cancelTryOut('POSTengine-chats-unarchiveChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-unarchiveChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/unarchiveChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-unarchiveChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-unarchiveChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-archiveChat">POST engine/chats/archiveChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-archiveChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/archiveChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/archiveChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/archiveChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/archiveChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-archiveChat">
</span>
<span id="execution-results-POSTengine-chats-archiveChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-archiveChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-archiveChat"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-archiveChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-archiveChat"></code></pre>
</span>
<form id="form-POSTengine-chats-archiveChat" data-method="POST"
      data-path="engine/chats/archiveChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-archiveChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-archiveChat"
                    onclick="tryItOut('POSTengine-chats-archiveChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-archiveChat"
                    onclick="cancelTryOut('POSTengine-chats-archiveChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-archiveChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/archiveChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-archiveChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-archiveChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-unreadChat">POST engine/chats/unreadChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-unreadChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/unreadChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/unreadChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/unreadChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/unreadChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-unreadChat">
</span>
<span id="execution-results-POSTengine-chats-unreadChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-unreadChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-unreadChat"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-unreadChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-unreadChat"></code></pre>
</span>
<form id="form-POSTengine-chats-unreadChat" data-method="POST"
      data-path="engine/chats/unreadChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-unreadChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-unreadChat"
                    onclick="tryItOut('POSTengine-chats-unreadChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-unreadChat"
                    onclick="cancelTryOut('POSTengine-chats-unreadChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-unreadChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/unreadChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-unreadChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-unreadChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-readChat">POST engine/chats/readChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-readChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/readChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/readChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/readChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/readChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-readChat">
</span>
<span id="execution-results-POSTengine-chats-readChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-readChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-readChat"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-readChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-readChat"></code></pre>
</span>
<form id="form-POSTengine-chats-readChat" data-method="POST"
      data-path="engine/chats/readChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-readChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-readChat"
                    onclick="tryItOut('POSTengine-chats-readChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-readChat"
                    onclick="cancelTryOut('POSTengine-chats-readChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-readChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/readChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-readChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-readChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-chats-deleteChat">POST engine/chats/deleteChat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-chats-deleteChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/chats/deleteChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats/deleteChat"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/chats/deleteChat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats/deleteChat'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-chats-deleteChat">
</span>
<span id="execution-results-POSTengine-chats-deleteChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-chats-deleteChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-chats-deleteChat"></code></pre>
</span>
<span id="execution-error-POSTengine-chats-deleteChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-chats-deleteChat"></code></pre>
</span>
<form id="form-POSTengine-chats-deleteChat" data-method="POST"
      data-path="engine/chats/deleteChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-chats-deleteChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-chats-deleteChat"
                    onclick="tryItOut('POSTengine-chats-deleteChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-chats-deleteChat"
                    onclick="cancelTryOut('POSTengine-chats-deleteChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-chats-deleteChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/chats/deleteChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-chats-deleteChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-chats-deleteChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-GETengine-chats">GET engine/chats</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-chats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/chats" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/chats"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://official.whatsapp.loc/engine/chats',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/chats'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETengine-chats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=wRgiTewj8pK1abXL9C5vNoyavQ3zG0GOS6mV7wlF; expires=Mon, 10-Oct-2022 17:54:59 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: {
        &quot;status&quot;: 0,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Authorization Key is required&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETengine-chats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-chats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-chats"></code></pre>
</span>
<span id="execution-error-GETengine-chats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-chats"></code></pre>
</span>
<form id="form-GETengine-chats" data-method="GET"
      data-path="engine/chats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-chats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-chats"
                    onclick="tryItOut('GETengine-chats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-chats"
                    onclick="cancelTryOut('GETengine-chats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-chats" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/chats</code></b>
        </p>
                <p>
            <label id="auth-GETengine-chats" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-chats"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-catalogBulk">POST engine/messages/catalogBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-catalogBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/catalogBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/catalogBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/catalogBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/catalogBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-catalogBulk">
</span>
<span id="execution-results-POSTengine-messages-catalogBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-catalogBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-catalogBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-catalogBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-catalogBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-catalogBulk" data-method="POST"
      data-path="engine/messages/catalogBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-catalogBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-catalogBulk"
                    onclick="tryItOut('POSTengine-messages-catalogBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-catalogBulk"
                    onclick="cancelTryOut('POSTengine-messages-catalogBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-catalogBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/catalogBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-catalogBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-catalogBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-productBulk">POST engine/messages/productBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-productBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/productBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/productBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/productBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/productBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-productBulk">
</span>
<span id="execution-results-POSTengine-messages-productBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-productBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-productBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-productBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-productBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-productBulk" data-method="POST"
      data-path="engine/messages/productBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-productBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-productBulk"
                    onclick="tryItOut('POSTengine-messages-productBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-productBulk"
                    onclick="cancelTryOut('POSTengine-messages-productBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-productBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/productBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-productBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-productBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-groupInvitationBulk">POST engine/messages/groupInvitationBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-groupInvitationBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/groupInvitationBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/groupInvitationBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/groupInvitationBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/groupInvitationBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-groupInvitationBulk">
</span>
<span id="execution-results-POSTengine-messages-groupInvitationBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-groupInvitationBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-groupInvitationBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-groupInvitationBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-groupInvitationBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-groupInvitationBulk" data-method="POST"
      data-path="engine/messages/groupInvitationBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-groupInvitationBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-groupInvitationBulk"
                    onclick="tryItOut('POSTengine-messages-groupInvitationBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-groupInvitationBulk"
                    onclick="cancelTryOut('POSTengine-messages-groupInvitationBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-groupInvitationBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/groupInvitationBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-groupInvitationBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-groupInvitationBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-queues-clearMessagesQueue">POST engine/queues/clearMessagesQueue</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-queues-clearMessagesQueue">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/queues/clearMessagesQueue" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/queues/clearMessagesQueue"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/queues/clearMessagesQueue',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/queues/clearMessagesQueue'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-queues-clearMessagesQueue">
</span>
<span id="execution-results-POSTengine-queues-clearMessagesQueue" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-queues-clearMessagesQueue"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-queues-clearMessagesQueue"></code></pre>
</span>
<span id="execution-error-POSTengine-queues-clearMessagesQueue" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-queues-clearMessagesQueue"></code></pre>
</span>
<form id="form-POSTengine-queues-clearMessagesQueue" data-method="POST"
      data-path="engine/queues/clearMessagesQueue"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-queues-clearMessagesQueue', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-queues-clearMessagesQueue"
                    onclick="tryItOut('POSTengine-queues-clearMessagesQueue');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-queues-clearMessagesQueue"
                    onclick="cancelTryOut('POSTengine-queues-clearMessagesQueue');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-queues-clearMessagesQueue" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/queues/clearMessagesQueue</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-queues-clearMessagesQueue" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-queues-clearMessagesQueue"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-templateBulk">POST engine/messages/templateBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-templateBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/templateBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/templateBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/templateBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/templateBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-templateBulk">
</span>
<span id="execution-results-POSTengine-messages-templateBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-templateBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-templateBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-templateBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-templateBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-templateBulk" data-method="POST"
      data-path="engine/messages/templateBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-templateBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-templateBulk"
                    onclick="tryItOut('POSTengine-messages-templateBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-templateBulk"
                    onclick="cancelTryOut('POSTengine-messages-templateBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-templateBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/templateBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-templateBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-templateBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-catalogReply">POST engine/messages/catalogReply</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-catalogReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/catalogReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/catalogReply"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/catalogReply',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/catalogReply'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-catalogReply">
</span>
<span id="execution-results-POSTengine-messages-catalogReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-catalogReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-catalogReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-catalogReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-catalogReply"></code></pre>
</span>
<form id="form-POSTengine-messages-catalogReply" data-method="POST"
      data-path="engine/messages/catalogReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-catalogReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-catalogReply"
                    onclick="tryItOut('POSTengine-messages-catalogReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-catalogReply"
                    onclick="cancelTryOut('POSTengine-messages-catalogReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-catalogReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/catalogReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-catalogReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-catalogReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-mentionBulk">POST engine/messages/mentionBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-mentionBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/mentionBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/mentionBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/mentionBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/mentionBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-mentionBulk">
</span>
<span id="execution-results-POSTengine-messages-mentionBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-mentionBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-mentionBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-mentionBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-mentionBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-mentionBulk" data-method="POST"
      data-path="engine/messages/mentionBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-mentionBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-mentionBulk"
                    onclick="tryItOut('POSTengine-messages-mentionBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-mentionBulk"
                    onclick="cancelTryOut('POSTengine-messages-mentionBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-mentionBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/mentionBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-mentionBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-mentionBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-disappearingBulk">POST engine/messages/disappearingBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-disappearingBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/disappearingBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/disappearingBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/disappearingBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/disappearingBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-disappearingBulk">
</span>
<span id="execution-results-POSTengine-messages-disappearingBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-disappearingBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-disappearingBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-disappearingBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-disappearingBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-disappearingBulk" data-method="POST"
      data-path="engine/messages/disappearingBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-disappearingBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-disappearingBulk"
                    onclick="tryItOut('POSTengine-messages-disappearingBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-disappearingBulk"
                    onclick="cancelTryOut('POSTengine-messages-disappearingBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-disappearingBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/disappearingBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-disappearingBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-disappearingBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-contactBulk">POST engine/messages/contactBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-contactBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/contactBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/contactBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/contactBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/contactBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-contactBulk">
</span>
<span id="execution-results-POSTengine-messages-contactBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-contactBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-contactBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-contactBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-contactBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-contactBulk" data-method="POST"
      data-path="engine/messages/contactBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-contactBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-contactBulk"
                    onclick="tryItOut('POSTengine-messages-contactBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-contactBulk"
                    onclick="cancelTryOut('POSTengine-messages-contactBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-contactBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/contactBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-contactBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-contactBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-locationBulk">POST engine/messages/locationBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-locationBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/locationBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/locationBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/locationBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/locationBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-locationBulk">
</span>
<span id="execution-results-POSTengine-messages-locationBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-locationBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-locationBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-locationBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-locationBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-locationBulk" data-method="POST"
      data-path="engine/messages/locationBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-locationBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-locationBulk"
                    onclick="tryItOut('POSTengine-messages-locationBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-locationBulk"
                    onclick="cancelTryOut('POSTengine-messages-locationBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-locationBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/locationBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-locationBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-locationBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-gifBulk">POST engine/messages/gifBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-gifBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/gifBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/gifBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/gifBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/gifBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-gifBulk">
</span>
<span id="execution-results-POSTengine-messages-gifBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-gifBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-gifBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-gifBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-gifBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-gifBulk" data-method="POST"
      data-path="engine/messages/gifBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-gifBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-gifBulk"
                    onclick="tryItOut('POSTengine-messages-gifBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-gifBulk"
                    onclick="cancelTryOut('POSTengine-messages-gifBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-gifBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/gifBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-gifBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-gifBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-stickerBulk">POST engine/messages/stickerBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-stickerBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/stickerBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/stickerBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/stickerBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/stickerBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-stickerBulk">
</span>
<span id="execution-results-POSTengine-messages-stickerBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-stickerBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-stickerBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-stickerBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-stickerBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-stickerBulk" data-method="POST"
      data-path="engine/messages/stickerBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-stickerBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-stickerBulk"
                    onclick="tryItOut('POSTengine-messages-stickerBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-stickerBulk"
                    onclick="cancelTryOut('POSTengine-messages-stickerBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-stickerBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/stickerBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-stickerBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-stickerBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-fileBulk">POST engine/messages/fileBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-fileBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/fileBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/fileBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/fileBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/fileBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-fileBulk">
</span>
<span id="execution-results-POSTengine-messages-fileBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-fileBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-fileBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-fileBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-fileBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-fileBulk" data-method="POST"
      data-path="engine/messages/fileBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-fileBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-fileBulk"
                    onclick="tryItOut('POSTengine-messages-fileBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-fileBulk"
                    onclick="cancelTryOut('POSTengine-messages-fileBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-fileBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/fileBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-fileBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-fileBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-audioBulk">POST engine/messages/audioBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-audioBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/audioBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/audioBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/audioBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/audioBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-audioBulk">
</span>
<span id="execution-results-POSTengine-messages-audioBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-audioBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-audioBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-audioBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-audioBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-audioBulk" data-method="POST"
      data-path="engine/messages/audioBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-audioBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-audioBulk"
                    onclick="tryItOut('POSTengine-messages-audioBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-audioBulk"
                    onclick="cancelTryOut('POSTengine-messages-audioBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-audioBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/audioBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-audioBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-audioBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-videoBulk">POST engine/messages/videoBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-videoBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/videoBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/videoBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/videoBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/videoBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-videoBulk">
</span>
<span id="execution-results-POSTengine-messages-videoBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-videoBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-videoBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-videoBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-videoBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-videoBulk" data-method="POST"
      data-path="engine/messages/videoBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-videoBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-videoBulk"
                    onclick="tryItOut('POSTengine-messages-videoBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-videoBulk"
                    onclick="cancelTryOut('POSTengine-messages-videoBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-videoBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/videoBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-videoBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-videoBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-imageBulk">POST engine/messages/imageBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-imageBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/imageBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/imageBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/imageBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/imageBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-imageBulk">
</span>
<span id="execution-results-POSTengine-messages-imageBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-imageBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-imageBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-imageBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-imageBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-imageBulk" data-method="POST"
      data-path="engine/messages/imageBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-imageBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-imageBulk"
                    onclick="tryItOut('POSTengine-messages-imageBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-imageBulk"
                    onclick="cancelTryOut('POSTengine-messages-imageBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-imageBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/imageBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-imageBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-imageBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-textBulk">POST engine/messages/textBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-textBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/textBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/textBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/textBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/textBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-textBulk">
</span>
<span id="execution-results-POSTengine-messages-textBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-textBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-textBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-textBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-textBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-textBulk" data-method="POST"
      data-path="engine/messages/textBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-textBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-textBulk"
                    onclick="tryItOut('POSTengine-messages-textBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-textBulk"
                    onclick="cancelTryOut('POSTengine-messages-textBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-textBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/textBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-textBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-textBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTengine-messages-buttonsBulk">POST engine/messages/buttonsBulk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-buttonsBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/buttonsBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/buttonsBulk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/messages/buttonsBulk',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/messages/buttonsBulk'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-messages-buttonsBulk">
</span>
<span id="execution-results-POSTengine-messages-buttonsBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-buttonsBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-buttonsBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-buttonsBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-buttonsBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-buttonsBulk" data-method="POST"
      data-path="engine/messages/buttonsBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-buttonsBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-buttonsBulk"
                    onclick="tryItOut('POSTengine-messages-buttonsBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-buttonsBulk"
                    onclick="cancelTryOut('POSTengine-messages-buttonsBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-buttonsBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/buttonsBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-buttonsBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-buttonsBulk"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="channels">Channels</h1>

    

            <h2 id="channels-POSTengine-channels-deleteChannel">API for deleteing specific channel by id</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-channels-deleteChannel">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/channels/deleteChannel" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/channels/deleteChannel"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/channels/deleteChannel',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/channels/deleteChannel'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-channels-deleteChannel">
</span>
<span id="execution-results-POSTengine-channels-deleteChannel" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-channels-deleteChannel"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-channels-deleteChannel"></code></pre>
</span>
<span id="execution-error-POSTengine-channels-deleteChannel" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-channels-deleteChannel"></code></pre>
</span>
<form id="form-POSTengine-channels-deleteChannel" data-method="POST"
      data-path="engine/channels/deleteChannel"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-channels-deleteChannel', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-channels-deleteChannel"
                    onclick="tryItOut('POSTengine-channels-deleteChannel');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-channels-deleteChannel"
                    onclick="cancelTryOut('POSTengine-channels-deleteChannel');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-channels-deleteChannel" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/channels/deleteChannel</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-channels-deleteChannel" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-channels-deleteChannel"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="channels-POSTengine-channels-transferDays">API for transfering days from a channel to another</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-channels-transferDays">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/channels/transferDays" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/channels/transferDays"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "CHANNELID": "7420",
    "CHANNELTOKEN": "2240e354c21899584a46ddd7653f7c66",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://official.whatsapp.loc/engine/channels/transferDays',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'CHANNELID' =&gt; '7420',
            'CHANNELTOKEN' =&gt; '2240e354c21899584a46ddd7653f7c66',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://official.whatsapp.loc/engine/channels/transferDays'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'CHANNELID': '7420',
  'CHANNELTOKEN': '2240e354c21899584a46ddd7653f7c66'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-channels-transferDays">
</span>
<span id="execution-results-POSTengine-channels-transferDays" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-channels-transferDays"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-channels-transferDays"></code></pre>
</span>
<span id="execution-error-POSTengine-channels-transferDays" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-channels-transferDays"></code></pre>
</span>
<form id="form-POSTengine-channels-transferDays" data-method="POST"
      data-path="engine/channels/transferDays"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-channels-transferDays', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-channels-transferDays"
                    onclick="tryItOut('POSTengine-channels-transferDays');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-channels-transferDays"
                    onclick="cancelTryOut('POSTengine-channels-transferDays');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-channels-transferDays" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/channels/transferDays</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-channels-transferDays" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-channels-transferDays"
                                                                data-component="header"></label>
        </p>
                </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                                                        <button type="button" class="lang-button" data-language-name="python">python</button>
                            </div>
            </div>
</div>
</body>
</html>
