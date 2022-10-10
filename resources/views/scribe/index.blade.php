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
                <li class="tocify-item level-1" data-unique="channels">
                    <a href="#channels">Channels</a>
                </li>
                                    <ul id="tocify-subheader-channels" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="channels-POSTengine-channels">
                        <a href="#channels-POSTengine-channels">API for listing all user channels</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="channels-POSTengine-channels-createChannel">
                        <a href="#channels-POSTengine-channels-createChannel">API for creating new channel</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="channels-POSTengine-channels-deleteChannel">
                        <a href="#channels-POSTengine-channels-deleteChannel">API for deleteing specific channel by id</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="channels-POSTengine-channels-transferDays">
                        <a href="#channels-POSTengine-channels-transferDays">API for transfering days from a channel to another</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="chats">
                    <a href="#chats">Chats</a>
                </li>
                                    <ul id="tocify-subheader-chats" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="chats-GETengine-dialogs-fetchDialogs">
                        <a href="#chats-GETengine-dialogs-fetchDialogs">API for listing all chats</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-readChat">
                        <a href="#chats-POSTengine-dialogs-readChat">API for reading chat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-unreadChat">
                        <a href="#chats-POSTengine-dialogs-unreadChat">API for unreading chat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-archiveChat">
                        <a href="#chats-POSTengine-dialogs-archiveChat">API for archiving chat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-unarchiveChat">
                        <a href="#chats-POSTengine-dialogs-unarchiveChat">API for unarchiving chat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-pinChat">
                        <a href="#chats-POSTengine-dialogs-pinChat">API for pinning chat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-unpinChat">
                        <a href="#chats-POSTengine-dialogs-unpinChat">API for unpinning chat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-muteChat">
                        <a href="#chats-POSTengine-dialogs-muteChat">API for muting chat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-unmuteChat">
                        <a href="#chats-POSTengine-dialogs-unmuteChat">API for unmuting chat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-typing">
                        <a href="#chats-POSTengine-dialogs-typing">API for sending typing status to specific chat</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="chats-POSTengine-dialogs-recording">
                        <a href="#chats-POSTengine-dialogs-recording">API for sending recording status to specific chat</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="instances">
                    <a href="#instances">Instances</a>
                </li>
                                    <ul id="tocify-subheader-instances" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="instances-GETengine-instances-qr">
                        <a href="#instances-GETengine-instances-qr">API for getting new qr</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="instances-GETengine-instances-status">
                        <a href="#instances-GETengine-instances-status">API for checking connection status</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="instances-POSTengine-instances-disconnect">
                        <a href="#instances-POSTengine-instances-disconnect">API for disconnecting the connection</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="instances-POSTengine-instances-clearInstance">
                        <a href="#instances-POSTengine-instances-clearInstance">API for clearing channel and delete all of its data</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="instances-POSTengine-instances-updateChannelSetting">
                        <a href="#instances-POSTengine-instances-updateChannelSetting">API for updating channel settings like webhook urls</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="instances-GETengine-instances-me">
                        <a href="#instances-GETengine-instances-me">API for getting current connection account data</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-5" class="tocify-header">
                <li class="tocify-item level-1" data-unique="messages">
                    <a href="#messages">Messages</a>
                </li>
                                    <ul id="tocify-subheader-messages" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="messages-GETengine-messages-fetchMessages">
                        <a href="#messages-GETengine-messages-fetchMessages">API for listing all messages</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendMessage">
                        <a href="#messages-POSTengine-messages-sendMessage">API for sending text message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendImage">
                        <a href="#messages-POSTengine-messages-sendImage">API for sending image message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendAudio">
                        <a href="#messages-POSTengine-messages-sendAudio">API for sending audio message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendVideo">
                        <a href="#messages-POSTengine-messages-sendVideo">API for sending video message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendFile">
                        <a href="#messages-POSTengine-messages-sendFile">API for sending file message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendSticker">
                        <a href="#messages-POSTengine-messages-sendSticker">API for sending sticker message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendGif">
                        <a href="#messages-POSTengine-messages-sendGif">API for sending gif message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendLink">
                        <a href="#messages-POSTengine-messages-sendLink">API for sending link message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendLocation">
                        <a href="#messages-POSTengine-messages-sendLocation">API for sending location message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendContact">
                        <a href="#messages-POSTengine-messages-sendContact">API for sending contact message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendDisappearingMessage">
                        <a href="#messages-POSTengine-messages-sendDisappearingMessage">API for sending disappearing message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendMention">
                        <a href="#messages-POSTengine-messages-sendMention">API for sending mention message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendReaction">
                        <a href="#messages-POSTengine-messages-sendReaction">API for sending reaction on message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendButtons">
                        <a href="#messages-POSTengine-messages-sendButtons">API for sending buttons message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendTemplates">
                        <a href="#messages-POSTengine-messages-sendTemplates">API for sending template message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendList">
                        <a href="#messages-POSTengine-messages-sendList">API for sending list message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-forwardMessage">
                        <a href="#messages-POSTengine-messages-forwardMessage">API for forwarding specific message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendReply">
                        <a href="#messages-POSTengine-messages-sendReply">API for sending a reply on message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-sendBulk">
                        <a href="#messages-POSTengine-messages-sendBulk">API for sending group messages with interval</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-deleteMessageForAll">
                        <a href="#messages-POSTengine-messages-deleteMessageForAll">API for deleting message for all</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-deleteMessageForMe">
                        <a href="#messages-POSTengine-messages-deleteMessageForMe">API for deleting message for me</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-repeatHook">
                        <a href="#messages-POSTengine-messages-repeatHook">API for repeating message hook</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-starMessage">
                        <a href="#messages-POSTengine-messages-starMessage">API for starring specific message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messages-POSTengine-messages-unstarMessage">
                        <a href="#messages-POSTengine-messages-unstarMessage">API for unstarring specific message</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-6" class="tocify-header">
                <li class="tocify-item level-1" data-unique="users">
                    <a href="#users">Users</a>
                </li>
                                    <ul id="tocify-subheader-users" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="users-GETengine-users-contacts">
                        <a href="#users-GETengine-users-contacts">API for listing all contacts</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-POSTengine-users-displayPicture">
                        <a href="#users-POSTengine-users-displayPicture">API for displaying profile picture</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-POSTengine-users-getUserStatus">
                        <a href="#users-POSTengine-users-getUserStatus">API for getting user status</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-POSTengine-users-getUserPresence">
                        <a href="#users-POSTengine-users-getUserPresence">API for getting user presence</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-POSTengine-users-setUserPresence">
                        <a href="#users-POSTengine-users-setUserPresence">API for setting user presence</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-POSTengine-users-getUserBusinessProfile">
                        <a href="#users-POSTengine-users-getUserBusinessProfile">API for getting business user profile</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-POSTengine-users-blockUser">
                        <a href="#users-POSTengine-users-blockUser">API for blocking user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-POSTengine-users-unblockUser">
                        <a href="#users-POSTengine-users-unblockUser">API for unblocking user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-POSTengine-users-checkPhone">
                        <a href="#users-POSTengine-users-checkPhone">API for checking if phone has whatsapp or no</a>
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
        <li>Last updated: October 5 2022</li>
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
<p>This API is authenticated by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="channels">Channels</h1>

    

            <h2 id="channels-POSTengine-channels">API for listing all user channels</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-channels">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/channels" \
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
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
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

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTengine-channels">
</span>
<span id="execution-results-POSTengine-channels" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-channels"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-channels"></code></pre>
</span>
<span id="execution-error-POSTengine-channels" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-channels"></code></pre>
</span>
<form id="form-POSTengine-channels" data-method="POST"
      data-path="engine/channels"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-channels', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-channels"
                    onclick="tryItOut('POSTengine-channels');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-channels"
                    onclick="cancelTryOut('POSTengine-channels');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-channels" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/channels</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-channels" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-channels"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="channels-POSTengine-channels-createChannel">API for creating new channel</h2>

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

        <h1 id="chats">Chats</h1>

    

            <h2 id="chats-GETengine-dialogs-fetchDialogs">API for listing all chats</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-dialogs-fetchDialogs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/dialogs/fetchDialogs" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/fetchDialogs"
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
    'http://official.whatsapp.loc/engine/dialogs/fetchDialogs',
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

url = 'http://official.whatsapp.loc/engine/dialogs/fetchDialogs'
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

<span id="example-responses-GETengine-dialogs-fetchDialogs">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=yiO1gsfZ0yWnW2Ui3fbKCWIuwNLwDF83QxRqHyUj; expires=Wed, 05-Oct-2022 09:24:07 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
<span id="execution-results-GETengine-dialogs-fetchDialogs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-dialogs-fetchDialogs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-dialogs-fetchDialogs"></code></pre>
</span>
<span id="execution-error-GETengine-dialogs-fetchDialogs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-dialogs-fetchDialogs"></code></pre>
</span>
<form id="form-GETengine-dialogs-fetchDialogs" data-method="GET"
      data-path="engine/dialogs/fetchDialogs"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-dialogs-fetchDialogs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-dialogs-fetchDialogs"
                    onclick="tryItOut('GETengine-dialogs-fetchDialogs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-dialogs-fetchDialogs"
                    onclick="cancelTryOut('GETengine-dialogs-fetchDialogs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-dialogs-fetchDialogs" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/dialogs/fetchDialogs</code></b>
        </p>
                <p>
            <label id="auth-GETengine-dialogs-fetchDialogs" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-dialogs-fetchDialogs"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-readChat">API for reading chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-readChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/readChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/readChat"
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
    'http://official.whatsapp.loc/engine/dialogs/readChat',
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

url = 'http://official.whatsapp.loc/engine/dialogs/readChat'
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

<span id="example-responses-POSTengine-dialogs-readChat">
</span>
<span id="execution-results-POSTengine-dialogs-readChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-readChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-readChat"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-readChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-readChat"></code></pre>
</span>
<form id="form-POSTengine-dialogs-readChat" data-method="POST"
      data-path="engine/dialogs/readChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-readChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-readChat"
                    onclick="tryItOut('POSTengine-dialogs-readChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-readChat"
                    onclick="cancelTryOut('POSTengine-dialogs-readChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-readChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/readChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-readChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-readChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-unreadChat">API for unreading chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-unreadChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/unreadChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/unreadChat"
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
    'http://official.whatsapp.loc/engine/dialogs/unreadChat',
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

url = 'http://official.whatsapp.loc/engine/dialogs/unreadChat'
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

<span id="example-responses-POSTengine-dialogs-unreadChat">
</span>
<span id="execution-results-POSTengine-dialogs-unreadChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-unreadChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-unreadChat"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-unreadChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-unreadChat"></code></pre>
</span>
<form id="form-POSTengine-dialogs-unreadChat" data-method="POST"
      data-path="engine/dialogs/unreadChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-unreadChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-unreadChat"
                    onclick="tryItOut('POSTengine-dialogs-unreadChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-unreadChat"
                    onclick="cancelTryOut('POSTengine-dialogs-unreadChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-unreadChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/unreadChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-unreadChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-unreadChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-archiveChat">API for archiving chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-archiveChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/archiveChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/archiveChat"
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
    'http://official.whatsapp.loc/engine/dialogs/archiveChat',
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

url = 'http://official.whatsapp.loc/engine/dialogs/archiveChat'
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

<span id="example-responses-POSTengine-dialogs-archiveChat">
</span>
<span id="execution-results-POSTengine-dialogs-archiveChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-archiveChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-archiveChat"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-archiveChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-archiveChat"></code></pre>
</span>
<form id="form-POSTengine-dialogs-archiveChat" data-method="POST"
      data-path="engine/dialogs/archiveChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-archiveChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-archiveChat"
                    onclick="tryItOut('POSTengine-dialogs-archiveChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-archiveChat"
                    onclick="cancelTryOut('POSTengine-dialogs-archiveChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-archiveChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/archiveChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-archiveChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-archiveChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-unarchiveChat">API for unarchiving chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-unarchiveChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/unarchiveChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/unarchiveChat"
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
    'http://official.whatsapp.loc/engine/dialogs/unarchiveChat',
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

url = 'http://official.whatsapp.loc/engine/dialogs/unarchiveChat'
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

<span id="example-responses-POSTengine-dialogs-unarchiveChat">
</span>
<span id="execution-results-POSTengine-dialogs-unarchiveChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-unarchiveChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-unarchiveChat"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-unarchiveChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-unarchiveChat"></code></pre>
</span>
<form id="form-POSTengine-dialogs-unarchiveChat" data-method="POST"
      data-path="engine/dialogs/unarchiveChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-unarchiveChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-unarchiveChat"
                    onclick="tryItOut('POSTengine-dialogs-unarchiveChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-unarchiveChat"
                    onclick="cancelTryOut('POSTengine-dialogs-unarchiveChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-unarchiveChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/unarchiveChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-unarchiveChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-unarchiveChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-pinChat">API for pinning chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-pinChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/pinChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/pinChat"
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
    'http://official.whatsapp.loc/engine/dialogs/pinChat',
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

url = 'http://official.whatsapp.loc/engine/dialogs/pinChat'
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

<span id="example-responses-POSTengine-dialogs-pinChat">
</span>
<span id="execution-results-POSTengine-dialogs-pinChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-pinChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-pinChat"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-pinChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-pinChat"></code></pre>
</span>
<form id="form-POSTengine-dialogs-pinChat" data-method="POST"
      data-path="engine/dialogs/pinChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-pinChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-pinChat"
                    onclick="tryItOut('POSTengine-dialogs-pinChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-pinChat"
                    onclick="cancelTryOut('POSTengine-dialogs-pinChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-pinChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/pinChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-pinChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-pinChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-unpinChat">API for unpinning chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-unpinChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/unpinChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/unpinChat"
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
    'http://official.whatsapp.loc/engine/dialogs/unpinChat',
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

url = 'http://official.whatsapp.loc/engine/dialogs/unpinChat'
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

<span id="example-responses-POSTengine-dialogs-unpinChat">
</span>
<span id="execution-results-POSTengine-dialogs-unpinChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-unpinChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-unpinChat"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-unpinChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-unpinChat"></code></pre>
</span>
<form id="form-POSTengine-dialogs-unpinChat" data-method="POST"
      data-path="engine/dialogs/unpinChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-unpinChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-unpinChat"
                    onclick="tryItOut('POSTengine-dialogs-unpinChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-unpinChat"
                    onclick="cancelTryOut('POSTengine-dialogs-unpinChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-unpinChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/unpinChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-unpinChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-unpinChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-muteChat">API for muting chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-muteChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/muteChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/muteChat"
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
    'http://official.whatsapp.loc/engine/dialogs/muteChat',
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

url = 'http://official.whatsapp.loc/engine/dialogs/muteChat'
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

<span id="example-responses-POSTengine-dialogs-muteChat">
</span>
<span id="execution-results-POSTengine-dialogs-muteChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-muteChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-muteChat"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-muteChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-muteChat"></code></pre>
</span>
<form id="form-POSTengine-dialogs-muteChat" data-method="POST"
      data-path="engine/dialogs/muteChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-muteChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-muteChat"
                    onclick="tryItOut('POSTengine-dialogs-muteChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-muteChat"
                    onclick="cancelTryOut('POSTengine-dialogs-muteChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-muteChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/muteChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-muteChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-muteChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-unmuteChat">API for unmuting chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-unmuteChat">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/unmuteChat" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/unmuteChat"
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
    'http://official.whatsapp.loc/engine/dialogs/unmuteChat',
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

url = 'http://official.whatsapp.loc/engine/dialogs/unmuteChat'
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

<span id="example-responses-POSTengine-dialogs-unmuteChat">
</span>
<span id="execution-results-POSTengine-dialogs-unmuteChat" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-unmuteChat"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-unmuteChat"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-unmuteChat" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-unmuteChat"></code></pre>
</span>
<form id="form-POSTengine-dialogs-unmuteChat" data-method="POST"
      data-path="engine/dialogs/unmuteChat"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-unmuteChat', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-unmuteChat"
                    onclick="tryItOut('POSTengine-dialogs-unmuteChat');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-unmuteChat"
                    onclick="cancelTryOut('POSTengine-dialogs-unmuteChat');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-unmuteChat" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/unmuteChat</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-unmuteChat" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-unmuteChat"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-typing">API for sending typing status to specific chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-typing">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/typing" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/typing"
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
    'http://official.whatsapp.loc/engine/dialogs/typing',
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

url = 'http://official.whatsapp.loc/engine/dialogs/typing'
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

<span id="example-responses-POSTengine-dialogs-typing">
</span>
<span id="execution-results-POSTengine-dialogs-typing" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-typing"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-typing"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-typing" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-typing"></code></pre>
</span>
<form id="form-POSTengine-dialogs-typing" data-method="POST"
      data-path="engine/dialogs/typing"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-typing', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-typing"
                    onclick="tryItOut('POSTengine-dialogs-typing');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-typing"
                    onclick="cancelTryOut('POSTengine-dialogs-typing');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-typing" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/typing</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-typing" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-typing"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="chats-POSTengine-dialogs-recording">API for sending recording status to specific chat</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-dialogs-recording">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/dialogs/recording" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/dialogs/recording"
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
    'http://official.whatsapp.loc/engine/dialogs/recording',
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

url = 'http://official.whatsapp.loc/engine/dialogs/recording'
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

<span id="example-responses-POSTengine-dialogs-recording">
</span>
<span id="execution-results-POSTengine-dialogs-recording" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-dialogs-recording"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-dialogs-recording"></code></pre>
</span>
<span id="execution-error-POSTengine-dialogs-recording" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-dialogs-recording"></code></pre>
</span>
<form id="form-POSTengine-dialogs-recording" data-method="POST"
      data-path="engine/dialogs/recording"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-dialogs-recording', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-dialogs-recording"
                    onclick="tryItOut('POSTengine-dialogs-recording');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-dialogs-recording"
                    onclick="cancelTryOut('POSTengine-dialogs-recording');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-dialogs-recording" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/dialogs/recording</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-dialogs-recording" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-dialogs-recording"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="instances">Instances</h1>

    

            <h2 id="instances-GETengine-instances-qr">API for getting new qr</h2>

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
set-cookie: laravel_session=caw18QmXRGGEZCK6anUsipFInGZKHIP05Igr5hwA; expires=Wed, 05-Oct-2022 09:24:06 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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

            <h2 id="instances-GETengine-instances-status">API for checking connection status</h2>

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
set-cookie: laravel_session=DkGsLNsjUdA3IblNLGq7hHgt0uSCh2jVzXNHxev2; expires=Wed, 05-Oct-2022 09:24:06 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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

            <h2 id="instances-POSTengine-instances-disconnect">API for disconnecting the connection</h2>

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

            <h2 id="instances-POSTengine-instances-clearInstance">API for clearing channel and delete all of its data</h2>

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

            <h2 id="instances-POSTengine-instances-updateChannelSetting">API for updating channel settings like webhook urls</h2>

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

            <h2 id="instances-GETengine-instances-me">API for getting current connection account data</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-instances-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/instances/me" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/instances/me"
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
    'http://official.whatsapp.loc/engine/instances/me',
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

url = 'http://official.whatsapp.loc/engine/instances/me'
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

<span id="example-responses-GETengine-instances-me">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=FdTrF8FtAOsjV1VkNf7c8zytqsWCAPZ1h0Be1CrT; expires=Wed, 05-Oct-2022 09:24:06 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
<span id="execution-results-GETengine-instances-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-instances-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-instances-me"></code></pre>
</span>
<span id="execution-error-GETengine-instances-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-instances-me"></code></pre>
</span>
<form id="form-GETengine-instances-me" data-method="GET"
      data-path="engine/instances/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-instances-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-instances-me"
                    onclick="tryItOut('GETengine-instances-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-instances-me"
                    onclick="cancelTryOut('GETengine-instances-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-instances-me" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/instances/me</code></b>
        </p>
                <p>
            <label id="auth-GETengine-instances-me" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-instances-me"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="messages">Messages</h1>

    

            <h2 id="messages-GETengine-messages-fetchMessages">API for listing all messages</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETengine-messages-fetchMessages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://official.whatsapp.loc/engine/messages/fetchMessages" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/fetchMessages"
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
    'http://official.whatsapp.loc/engine/messages/fetchMessages',
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

url = 'http://official.whatsapp.loc/engine/messages/fetchMessages'
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

<span id="example-responses-GETengine-messages-fetchMessages">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=fBDNuXcOs3r0shOpiazmdqyOUd0SDWhnYFUUpGkC; expires=Wed, 05-Oct-2022 09:24:07 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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
<span id="execution-results-GETengine-messages-fetchMessages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETengine-messages-fetchMessages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETengine-messages-fetchMessages"></code></pre>
</span>
<span id="execution-error-GETengine-messages-fetchMessages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETengine-messages-fetchMessages"></code></pre>
</span>
<form id="form-GETengine-messages-fetchMessages" data-method="GET"
      data-path="engine/messages/fetchMessages"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETengine-messages-fetchMessages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETengine-messages-fetchMessages"
                    onclick="tryItOut('GETengine-messages-fetchMessages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETengine-messages-fetchMessages"
                    onclick="cancelTryOut('GETengine-messages-fetchMessages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETengine-messages-fetchMessages" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>engine/messages/fetchMessages</code></b>
        </p>
                <p>
            <label id="auth-GETengine-messages-fetchMessages" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETengine-messages-fetchMessages"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="messages-POSTengine-messages-sendMessage">API for sending text message</h2>

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

            <h2 id="messages-POSTengine-messages-sendImage">API for sending image message</h2>

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

            <h2 id="messages-POSTengine-messages-sendAudio">API for sending audio message</h2>

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

            <h2 id="messages-POSTengine-messages-sendVideo">API for sending video message</h2>

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

            <h2 id="messages-POSTengine-messages-sendFile">API for sending file message</h2>

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

            <h2 id="messages-POSTengine-messages-sendSticker">API for sending sticker message</h2>

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

            <h2 id="messages-POSTengine-messages-sendGif">API for sending gif message</h2>

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

            <h2 id="messages-POSTengine-messages-sendLink">API for sending link message</h2>

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

            <h2 id="messages-POSTengine-messages-sendLocation">API for sending location message</h2>

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

            <h2 id="messages-POSTengine-messages-sendContact">API for sending contact message</h2>

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

            <h2 id="messages-POSTengine-messages-sendDisappearingMessage">API for sending disappearing message</h2>

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

            <h2 id="messages-POSTengine-messages-sendMention">API for sending mention message</h2>

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

            <h2 id="messages-POSTengine-messages-sendReaction">API for sending reaction on message</h2>

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

            <h2 id="messages-POSTengine-messages-sendButtons">API for sending buttons message</h2>

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

            <h2 id="messages-POSTengine-messages-sendTemplates">API for sending template message</h2>

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

            <h2 id="messages-POSTengine-messages-sendList">API for sending list message</h2>

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

            <h2 id="messages-POSTengine-messages-forwardMessage">API for forwarding specific message</h2>

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

            <h2 id="messages-POSTengine-messages-sendReply">API for sending a reply on message</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendReply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendReply" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendReply"
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
    'http://official.whatsapp.loc/engine/messages/sendReply',
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

url = 'http://official.whatsapp.loc/engine/messages/sendReply'
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

<span id="example-responses-POSTengine-messages-sendReply">
</span>
<span id="execution-results-POSTengine-messages-sendReply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendReply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendReply"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendReply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendReply"></code></pre>
</span>
<form id="form-POSTengine-messages-sendReply" data-method="POST"
      data-path="engine/messages/sendReply"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendReply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendReply"
                    onclick="tryItOut('POSTengine-messages-sendReply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendReply"
                    onclick="cancelTryOut('POSTengine-messages-sendReply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendReply" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendReply</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendReply" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendReply"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="messages-POSTengine-messages-sendBulk">API for sending group messages with interval</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-messages-sendBulk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/messages/sendBulk" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/messages/sendBulk"
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
    'http://official.whatsapp.loc/engine/messages/sendBulk',
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

url = 'http://official.whatsapp.loc/engine/messages/sendBulk'
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

<span id="example-responses-POSTengine-messages-sendBulk">
</span>
<span id="execution-results-POSTengine-messages-sendBulk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-messages-sendBulk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-messages-sendBulk"></code></pre>
</span>
<span id="execution-error-POSTengine-messages-sendBulk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-messages-sendBulk"></code></pre>
</span>
<form id="form-POSTengine-messages-sendBulk" data-method="POST"
      data-path="engine/messages/sendBulk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-messages-sendBulk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-messages-sendBulk"
                    onclick="tryItOut('POSTengine-messages-sendBulk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-messages-sendBulk"
                    onclick="cancelTryOut('POSTengine-messages-sendBulk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-messages-sendBulk" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/messages/sendBulk</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-messages-sendBulk" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-messages-sendBulk"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="messages-POSTengine-messages-deleteMessageForAll">API for deleting message for all</h2>

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

            <h2 id="messages-POSTengine-messages-deleteMessageForMe">API for deleting message for me</h2>

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

            <h2 id="messages-POSTengine-messages-repeatHook">API for repeating message hook</h2>

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

            <h2 id="messages-POSTengine-messages-starMessage">API for starring specific message</h2>

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

            <h2 id="messages-POSTengine-messages-unstarMessage">API for unstarring specific message</h2>

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

        <h1 id="users">Users</h1>

    

            <h2 id="users-GETengine-users-contacts">API for listing all contacts</h2>

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
set-cookie: laravel_session=KYzL8gqZBgSIEAEH6By0T7A48jklRyJNA3BwNDN1; expires=Wed, 05-Oct-2022 09:24:07 GMT; Max-Age=7200; path=/; httponly; samesite=lax
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

            <h2 id="users-POSTengine-users-displayPicture">API for displaying profile picture</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-displayPicture">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/displayPicture" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/displayPicture"
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
    'http://official.whatsapp.loc/engine/users/displayPicture',
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

url = 'http://official.whatsapp.loc/engine/users/displayPicture'
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

<span id="example-responses-POSTengine-users-displayPicture">
</span>
<span id="execution-results-POSTengine-users-displayPicture" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-displayPicture"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-displayPicture"></code></pre>
</span>
<span id="execution-error-POSTengine-users-displayPicture" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-displayPicture"></code></pre>
</span>
<form id="form-POSTengine-users-displayPicture" data-method="POST"
      data-path="engine/users/displayPicture"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-displayPicture', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-displayPicture"
                    onclick="tryItOut('POSTengine-users-displayPicture');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-displayPicture"
                    onclick="cancelTryOut('POSTengine-users-displayPicture');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-displayPicture" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/displayPicture</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-displayPicture" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-displayPicture"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="users-POSTengine-users-getUserStatus">API for getting user status</h2>

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

            <h2 id="users-POSTengine-users-getUserPresence">API for getting user presence</h2>

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

            <h2 id="users-POSTengine-users-setUserPresence">API for setting user presence</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-setUserPresence">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/setUserPresence" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/setUserPresence"
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
    'http://official.whatsapp.loc/engine/users/setUserPresence',
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

url = 'http://official.whatsapp.loc/engine/users/setUserPresence'
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

<span id="example-responses-POSTengine-users-setUserPresence">
</span>
<span id="execution-results-POSTengine-users-setUserPresence" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-setUserPresence"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-setUserPresence"></code></pre>
</span>
<span id="execution-error-POSTengine-users-setUserPresence" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-setUserPresence"></code></pre>
</span>
<form id="form-POSTengine-users-setUserPresence" data-method="POST"
      data-path="engine/users/setUserPresence"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-setUserPresence', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-setUserPresence"
                    onclick="tryItOut('POSTengine-users-setUserPresence');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-setUserPresence"
                    onclick="cancelTryOut('POSTengine-users-setUserPresence');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-setUserPresence" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/setUserPresence</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-setUserPresence" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-setUserPresence"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="users-POSTengine-users-getUserBusinessProfile">API for getting business user profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTengine-users-getUserBusinessProfile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://official.whatsapp.loc/engine/users/getUserBusinessProfile" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "CHANNELID: 7420" \
    --header "CHANNELTOKEN: 2240e354c21899584a46ddd7653f7c66"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://official.whatsapp.loc/engine/users/getUserBusinessProfile"
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
    'http://official.whatsapp.loc/engine/users/getUserBusinessProfile',
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

url = 'http://official.whatsapp.loc/engine/users/getUserBusinessProfile'
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

<span id="example-responses-POSTengine-users-getUserBusinessProfile">
</span>
<span id="execution-results-POSTengine-users-getUserBusinessProfile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTengine-users-getUserBusinessProfile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTengine-users-getUserBusinessProfile"></code></pre>
</span>
<span id="execution-error-POSTengine-users-getUserBusinessProfile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTengine-users-getUserBusinessProfile"></code></pre>
</span>
<form id="form-POSTengine-users-getUserBusinessProfile" data-method="POST"
      data-path="engine/users/getUserBusinessProfile"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","CHANNELID":"7420","CHANNELTOKEN":"2240e354c21899584a46ddd7653f7c66"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTengine-users-getUserBusinessProfile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTengine-users-getUserBusinessProfile"
                    onclick="tryItOut('POSTengine-users-getUserBusinessProfile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTengine-users-getUserBusinessProfile"
                    onclick="cancelTryOut('POSTengine-users-getUserBusinessProfile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTengine-users-getUserBusinessProfile" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>engine/users/getUserBusinessProfile</code></b>
        </p>
                <p>
            <label id="auth-POSTengine-users-getUserBusinessProfile" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTengine-users-getUserBusinessProfile"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="users-POSTengine-users-blockUser">API for blocking user</h2>

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

            <h2 id="users-POSTengine-users-unblockUser">API for unblocking user</h2>

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

            <h2 id="users-POSTengine-users-checkPhone">API for checking if phone has whatsapp or no</h2>

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
