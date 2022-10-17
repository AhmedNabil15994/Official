<?php namespace App\Http\Controllers;

use Request;
use Response;
use URL;
use DB;
use App\Models\Device;
use App\Models\DeviceSetting;
use App\Models\Channel;
use App\Models\Message;
use App\Models\OfflineMessage;
use Illuminate\Support\Facades\Http;
use \Spatie\WebhookServer\WebhookCall;
use Illuminate\Support\Facades\Redis;


class MessagesControllers extends Controller {

    use \TraitsFunc;

    /**
     * @OA\Get(
     *     path="/messages",
     *     tags={"Messages"},
     *     operationId="messages",
     *     summary="fetch all messages",
     *     description="fetch user all messages",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description="returns array of messages."),
     *     @OA\Parameter(description="Message Id to get specific message",in="query",name="messageId", required=false),
     *     @OA\Parameter(description="Page Number",in="query",name="page", required=false),
     *     @OA\Parameter(description="Page Size",in="query",name="page_size", required=false),
     * )
     */
    public function fetchMessages(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(isset($input['messageId']) && !empty($input['messageId'])){
            $input['messageId'] = explode('.us_',$input['messageId'])[1];
            $response = Http::post(env('URL_WA_SERVER').'/messages/getMessageByID?id='.$name,$input);
        }else{
            $queryString = '';
            if(isset($input['page']) && !empty($input['page'])){
                $queryString.= '&page='.$input['page'];
            }
            if(isset($input['page_size']) && !empty($input['page_size'])){
                $queryString.= '&page_size='.$input['page_size'];
            }
            $response = Http::get(env('URL_WA_SERVER').'/messages?id='.$name.$queryString);
        }

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $messages = [];
        if(isset($res->success) && $res->success){
            if(isset($res->data->data) && is_array($res->data->data)){
                foreach($res->data->data as $oneMessage){
                    if(isset($oneMessage->id)){
                        $message = \Helper::formatMessages(\Helper::formatArrayShape((array)$oneMessage),$name,true);
                        if(!empty($message)){
                            $messages[] = $message;
                        }
                    }
                }
                $data['data'] = $messages;
                $data['pagination'] = $res->data->pagination;
            }else{
                if(isset($res->data->id)){
                    $message = \Helper::formatMessages(\Helper::formatArrayShape((array)$res->data),$name,true);
                    if(!empty($message)){
                        $messages[] = $message;
                    }
                }
                $data['data'] = $messages;
            }
            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }else{
            return \TraitsFunc::ErrorMessage($res->message);
        }
    }

    /**
     * @OA\Post(
     *     path="/messages/sendMessage",
     *     tags={"Messages"},
     *     operationId="sendMessage",
     *     summary="text message",
     *     description="send text message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     * )
     */
    public function sendMessage(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['body']) || empty($input['body'])){
            return \TraitsFunc::ErrorMessage("Message Body field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendMessage?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->type = 'text';
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendImage",
     *     tags={"Messages"},
     *     operationId="sendImage",
     *     summary="send image message",
     *     description="send image message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Image Url to send",in="query",name="url", required=true),
     *     @OA\Parameter(description="Caption to send",in="query",name="caption", required=false),
     * )
     */
    public function sendImage(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Image URL field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendImage?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->type = 'image';
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $mimetype = $res->data->message->mimetype;
            $messageText = "The message has been added to your queue !!!";
        }else{
            $messageText = "Message Sent Successfully !!!";
            $mimetype = $res->data->message->imageMessage->mimetype;
        }

        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];
        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'image' => $fileURL,
            'caption' => isset($input['caption']) && !empty($input['caption']) ? $input['caption'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendVideo",
     *     tags={"Messages"},
     *     operationId="sendVideo",
     *     summary="send video message",
     *     description="send video message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Video Url to send",in="query",name="url", required=true),
     *     @OA\Parameter(description="Caption to send",in="query",name="caption", required=false),
     * )
     */
    public function sendVideo(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Video URL field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendVideo?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->type = 'video';
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $mimetype = $res->data->message->mimetype;
            $messageText = "The message has been added to your queue !!!";
        }else{
            $messageText = "Message Sent Successfully !!!";
            $mimetype = $res->data->message->videoMessage->mimetype;
        }

        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'video' => $fileURL,
            'caption' => isset($input['caption']) && !empty($input['caption']) ? $input['caption'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendAudio",
     *     tags={"Messages"},
     *     operationId="sendAudio",
     *     summary="send audio message",
     *     description="send audio message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Audio Url to send",in="query",name="url", required=true),
     * )
     */
    public function sendAudio(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Audio URL field is required !!");
        }

        $fileName = 'soundFile'.time();
        $extension = '.'.array_reverse(explode('.',$input['url']))[0];
        $path = public_path().'/uploads/temp/'.$fileName;
        file_put_contents($path.$extension, fopen($input['url'], 'r'));

        // shell_exec("ffmpeg -i ".$path.$extension." -ac 1 -c:a libopus -b:a 64k  -ar 48000 ".$path.".oga");
        shell_exec("/var/www/official/vendor/ffmpeg/ffmpeg -i ".$path.$extension." -ac 1 -c:a libopus -b:a 64k  -ar 48000 ".$path.".oga");
       
        $input['url'] = \URL::to('/').'/uploads/temp/'.$fileName.'.oga';

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendAudio?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->type = 'audio';
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $mimetype = 'audio/ogg';
            $messageText = "The message has been added to your queue !!!";
        }else{
            $messageText = "Message Sent Successfully !!!";
            $mimetype = $res->data->message->audioMessage->mimetype;
        }


        $extension = explode('/', $mimetype)[1];
        $extension = explode(';', $extension)[0];
        $extension = $extension == 'ogg' ? 'oga' : $extension;

        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.$extension;

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'audio' => $fileURL,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }
    
    /**
     * @OA\Post(
     *     path="/messages/sendFile",
     *     tags={"Messages"},
     *     operationId="sendFile",
     *     summary="send file message",
     *     description="send file message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="File Url to send",in="query",name="url", required=true),
     * )
     */
    public function sendFile(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("File URL field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendFile?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->type = 'file';
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $mimetype = $res->data->message->mimetype;
            $messageText = "The message has been added to your queue !!!";
        }else{
            $messageText = "Message Sent Successfully !!!";
            $mimetype = $res->data->message->documentMessage->mimetype;
        }

        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'file' => $fileURL,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendSticker",
     *     tags={"Messages"},
     *     operationId="sendSticker",
     *     summary="send sticker message",
     *     description="send sticker message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Sticker Url to send",in="query",name="url", required=true),
     * )
     */
    public function sendSticker(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Sticker URL field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendStiker?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->type = 'sticker';
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $mimetype = $res->data->message->mimetype;
            $messageText = "The message has been added to your queue !!!";
        }else{
            $messageText = "Message Sent Successfully !!!";
            $mimetype = $res->data->message->stickerMessage->mimetype;
        }

        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'sticker' => $fileURL,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendGif",
     *     tags={"Messages"},
     *     operationId="sendGif",
     *     summary="send gif message",
     *     description="send gif message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Gif Url to send",in="query",name="url", required=true),
     *     @OA\Parameter(description="Caption to send",in="query",name="caption", required=false),
     * )
     */
    public function sendGif(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Video URL field is required !!");
        }


        $fileName = 'gifFile'.time();
        $extension = '.'.array_reverse(explode('.',$input['url']))[0];
        $path = public_path().'/uploads/temp/'.$fileName;
        file_put_contents($path.$extension, fopen($input['url'], 'r'));

        shell_exec("ffmpeg -i ".$path.$extension.' -movflags faststart -pix_fmt yuv420p -vf "scale=trunc(iw/2)*2:trunc(ih/2)*2" '.$path.".mp4");
       
        $input['url'] = \URL::to('/').'/uploads/temp/'.$fileName.'.mp4';

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendGif?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->type = 'gif';
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $mimetype = $res->data->message->mimetype;
            $messageText = "The message has been added to your queue !!!";
        }else{
            $messageText = "Message Sent Successfully !!!";
            $mimetype = $res->data->message->videoMessage->mimetype;
        }

        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'gif' => $fileURL,
            'caption' => isset($input['caption']) && !empty($input['caption']) ? $input['caption'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendLink",
     *     tags={"Messages"},
     *     operationId="sendLink",
     *     summary="send link with preview message",
     *     description="send link with preview message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message URL to send to",in="query",name="url", required=true),
     *     @OA\Parameter(description="Message URL title to send to",in="query",name="title", required=true),
     *     @OA\Parameter(description="Message URL description to send to",in="query",name="description", required=false),
     * )
     */
    public function sendPreview(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['title']) || empty($input['title'])){
            return \TraitsFunc::ErrorMessage("Title field is required !!");
        }

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Url field is required !!");
        }

        $input['body'] = (isset($input['description']) && !empty($input['description']) ?  $input['description'].' ' : ''). $input['url'];

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendPreview?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->type = 'link';
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$input['phone']),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$input['phone']).'_'.(isset($res->data->key)? $res->data->key->id : $res->data),
        ];
      
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendLocation",
     *     tags={"Messages"},
     *     operationId="sendLocation",
     *     summary="send location message",
     *     description="send location message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Location latitude to send",in="query",name="latitude", required=true),
     *     @OA\Parameter(description="Location Longitude to send",in="query",name="longitude", required=false),
     *     @OA\Parameter(description="Location Address Text to send",in="query",name="address", required=false),
     * )
     */
    public function sendLocation(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['lat']) || empty($input['lat'])){
            return \TraitsFunc::ErrorMessage("Latitude field is required !!");
        }

        if(!isset($input['lng']) || empty($input['lng'])){
            return \TraitsFunc::ErrorMessage("Longitude field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendLocation?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->type = 'location';
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'latitude' => $input['lat'],
            'longitude' => $input['lng'],
            'address' => isset($input['address']) && !empty($input['address']) ? $input['address'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendContact",
     *     tags={"Messages"},
     *     operationId="sendContact",
     *     summary="send contact message",
     *     description="send contact message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Contact Name to send",in="query",name="name", required=true),
     *     @OA\Parameter(description="Contact Phone to send",in="query",name="contact", required=false),
     *     @OA\Parameter(description="Contact Organization to send",in="query",name="organization", required=false),
     * )
     */
    public function sendContact(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['name']) || empty($input['name'])){
            return \TraitsFunc::ErrorMessage("Contact Name field is required !!");
        }

        if(!isset($input['contactMobile']) || empty($input['contactMobile'])){
            return \TraitsFunc::ErrorMessage("Contact Mobile field is required !!");
        }

        $input['contact'] = $input['contactMobile'];
        unset($input['contactMobile']);

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendContact?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->type = 'contact';
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'name' => $input['name'],
            'contact' => $input['contact'],
            'organization' => isset($input['organization']) && !empty($input['organization']) ? $input['organization'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }
    /**********************************************************/

    /**
     * @OA\Post(
     *     path="/messages/sendDisappearingMessage",
     *     tags={"Messages"},
     *     operationId="sendDisappearingMessage",
     *     summary="send disappearing message",
     *     description="send disappearing message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Expiration in seconds",in="query",name="expiration", required=false),
     * )
     */
    public function sendDisappearingMessage(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['body']) || empty($input['body'])){
            return \TraitsFunc::ErrorMessage("Message Body field is required !!");
        }

        if(!isset($input['expiration']) || empty($input['expiration'])){
            return \TraitsFunc::ErrorMessage("Message Expiration field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendDisappearingMessage?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->type = 'disappearing';
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendMention",
     *     tags={"Messages"},
     *     operationId="sendMention",
     *     summary="send mention message",
     *     description="send mention message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Contact Mention to send",in="query",name="contact", required=true),
     * )
     */
    public function sendMention(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['mention']) || empty($input['mention'])){
            return \TraitsFunc::ErrorMessage("Mention field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendMention?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->type = 'mention';
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'mention' => $input['mention'],
            //'mentionText' => '@'.Message::where('chatName',$input['mention'])->where('fromMe',1)->first()->pushName,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendReaction",
     *     tags={"Messages"},
     *     operationId="sendReaction",
     *     summary="send reaction message",
     *     description="send reaction message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Message Id to react to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Reaction Index to react to (1 == '👍' , 2 == '❤️' , 3 == '😂', 4 == '😮' , 5 == '😢' , 6 == '🙏', 7 == to removed messages reactions)",in="query",name="reaction", required=true),
     * )
     */
    public function sendReaction(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

        if(!isset($input['reaction']) || empty($input['reaction'])){
            return \TraitsFunc::ErrorMessage("R field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReaction?id='.$name, [
            'phone' => $input['phone'],
            'body' => $input['reaction'],
            'messageId' => $input['messageId'],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->type = 'reaction';
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        if($input['reaction'] == 1){
            $reaction = '👍';
        }else if($input['reaction'] == 2){
            $reaction = '❤️';
        }else if($input['reaction'] == 3){
            $reaction = '😂';
        }else if($input['reaction'] == 4){
            $reaction = '😮';
        }else if($input['reaction'] == 5){
            $reaction = '😢';
        }else if($input['reaction'] == 6){
            $reaction = '🙏';
        }else{
            $reaction = '';
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'reactionIndex' => $input['reaction'],
            'reaction' => $reaction,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendButtons",
     *     tags={"Messages"},
     *     operationId="sendButtons",
     *     summary="send buttons message",
     *     description="send buttons message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Footer to send",in="query",name="footer", required=true),
     *     @OA\Parameter(description="Message Buttons to send",in="query",name="buttons", required=true),
     *     @OA\Parameter(description="Message Image URL to send",in="query",name="image", required=false),
     * )
     */
    public function sendButtons(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(empty($input)){
            return \TraitsFunc::ErrorMessage("Raw data field is required !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['body']) || empty($input['body'])){
            return \TraitsFunc::ErrorMessage("Message Body field is required !!");
        }

        if(!isset($input['footer']) || empty($input['footer'])){
            return \TraitsFunc::ErrorMessage("Message Footer field is required !!");
        }

        if(!isset($input['buttons']) || empty($input['buttons'])){
            return \TraitsFunc::ErrorMessage("Message Buttons field is required !!");
        }

        foreach ($input['buttons'] as $key => $button) {
            if(!isset($button['id']) || empty($button['id'])){
                return \TraitsFunc::ErrorMessage("Button ".($key+1)." ID is required !!");
            }
            if(!isset($button['title']) || empty($button['title'])){
                return \TraitsFunc::ErrorMessage("Button ".($key+1)." Title is required !!");
            }
        }

        $input['imageURL'] = '';
        $input['hasImage'] = 0;
        if(isset($input['image']) && !empty($input['image'])){
            $input['imageURL'] = $input['image'];
            $input['hasImage'] = 1;

            unset($input['image']);
        }

        if(isset($input['title']) && !empty($input['title']) && $input['hasImage'] == 0){
            $input['body'] = $input["title"]." \r\n \r\n".$input['body'];
        }
        

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendButtons?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->type = 'buttons';
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendTemplates",
     *     tags={"Messages"},
     *     operationId="sendTemplates",
     *     summary="send template message",
     *     description="send template message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Footer to send",in="query",name="footer", required=true),
     *     @OA\Parameter(description="Message Buttons to send",in="query",name="buttons", required=true),
     *     @OA\Parameter(description="Message Image URL to send",in="query",name="image", required=false),
     * )
     */
    public function sendTemplates(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(empty($input)){
            return \TraitsFunc::ErrorMessage("Raw data field is required !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['body']) || empty($input['body'])){
            return \TraitsFunc::ErrorMessage("Message Body field is required !!");
        }

        if(!isset($input['footer']) || empty($input['footer'])){
            return \TraitsFunc::ErrorMessage("Message Footer field is required !!");
        }

        if(!isset($input['buttons']) || empty($input['buttons'])){
            return \TraitsFunc::ErrorMessage("Message Buttons field is required !!");
        }

        foreach ($input['buttons'] as $key => $button) {
            if(!isset($button['id']) || empty($button['id'])){
                return \TraitsFunc::ErrorMessage("Button ".($key+1)." ID is required !!");
            }
            if(!isset($button['title']) || empty($button['title'])){
                return \TraitsFunc::ErrorMessage("Button ".($key+1)." Title is required !!");
            }
            if(!isset($button['type']) || empty($button['type']) || !in_array($button['type'],[1,2,3])){
                return \TraitsFunc::ErrorMessage("Button ".($key+1)." Type is required !!");
            }
            if(!isset($button['extra_data']) || empty($button['extra_data'])){
                return \TraitsFunc::ErrorMessage("Button ".($key+1)." Extra Data is required !!");
            }
        }

        $input['imageURL'] = '';
        $input['hasImage'] = 0;
        if(isset($input['image']) && !empty($input['image'])){
            $input['imageURL'] = $input['image'];
            $input['hasImage'] = 1;

            unset($input['image']);
        }
        
        if(isset($input['title']) && !empty($input['title']) && $input['hasImage'] == 0){
            $input['body'] = $input["title"]." \r\n \r\n".$input['body'];
        }

        $response = Http::post(env('URL_WA_SERVER').'/messages/sendButtonsTemplate?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->type = 'template';
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$input['phone']),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$input['phone']).'_'.(isset($res->data->key)? $res->data->key->id : $res->data),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendList",
     *     tags={"Messages"},
     *     operationId="sendList",
     *     summary="send list message",
     *     description="send list message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Title to send",in="query",name="title", required=true),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Footer to send",in="query",name="footer", required=true),
     *     @OA\Parameter(description="Message View list button Text to send",in="query",name="buttonText", required=true),
     *     @OA\Parameter(description="Message Sections to send",in="query",name="sections", required=true),
     * )
     */
    public function sendList(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(empty($input)){
            return \TraitsFunc::ErrorMessage("Raw data field is required !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['body']) || empty($input['body'])){
            return \TraitsFunc::ErrorMessage("Message Body field is required !!");
        }

        if(!isset($input['footer']) || empty($input['footer'])){
            return \TraitsFunc::ErrorMessage("Message Footer field is required !!");
        }

        if(!isset($input['title']) || empty($input['title'])){
            return \TraitsFunc::ErrorMessage("Message Title field is required !!");
        }

        if(!isset($input['buttonText']) || empty($input['buttonText'])){
            return \TraitsFunc::ErrorMessage("Message Button Text field is required !!");
        }

        if(!isset($input['sections']) || empty($input['sections'])){
            return \TraitsFunc::ErrorMessage("Message Sections field is required !!");
        }

        foreach ($input['sections'] as $key => $section) {
            if(!isset($section['title']) || empty($section['title'])){
                return \TraitsFunc::ErrorMessage("Section ".($key+1)." Title is required !!");
            }
            if(!isset($section['rows']) || empty($section['rows'])){
                return \TraitsFunc::ErrorMessage("Section ".($key+1)." Rows is required !!");
            }
            foreach ($section['rows'] as $rowKey => $oneRow) {
                if(!isset($oneRow['title']) || empty($oneRow['title'])){
                    return \TraitsFunc::ErrorMessage("Section ".($key+1)." Row ".($rowKey+1)." Title is required !!");
                }
                if(!isset($oneRow['rowId']) || empty($oneRow['rowId'])){
                    return \TraitsFunc::ErrorMessage("Section ".($key+1)." Row ".($rowKey+1)." RowID is required !!");
                }
            }
        }    
        
        $response = Http::post(env('URL_WA_SERVER').'/messages/sendListMessage?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->type = 'list';
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/sendGroupInvitation",
     *     tags={"Messages"},
     *     operationId="sendGroupInvitation",
     *     summary="send group invitation message",
     *     description="send group invitation message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Group Id to send",in="query",name="groupId", required=true),
     * )
     */
    public function sendGroupInvitation(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/groups/sendGroupInviteMessage?id='.$name, [
            'phone' => $input['phone'],
            'group' => $input['groupId'],
        ]);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messageText = "Message Sent Successfully !!!";
        if(isset($res->data->sessionId)){
            // Queued Messages
            $sessionId = $res->data->sessionId;
            $chatId = $res->data->key->remoteJid;
            $queuedTime = $res->data->messageTimestamp;
            $myData = (array)$res->data;

            unset($myData['messageTimestamp']);
            unset($myData['status']);
            unset($myData['sessionId']);

            $queuedMessageObj = OfflineMessage::where('sessionId',$sessionId)->where('chatId',$chatId)->where('sent_time',$queuedTime)->first();
            if(!$queuedMessageObj){
                $queuedMessageObj = new OfflineMessage;
            }
            $queuedMessageObj->sessionId = $sessionId;
            $queuedMessageObj->message = json_encode((object)$myData);
            $queuedMessageObj->type = 'groupInvitation';
            $queuedMessageObj->chatId = $chatId;
            $queuedMessageObj->sent_time = $queuedTime;
            $queuedMessageObj->created_at = DATE_TIME;
            $queuedMessageObj->save();
            $messageText = "The message has been added to your queue !!!";
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$input['phone']),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$input['phone']).'_'.(isset($res->data->key)? $res->data->key->id : $res->data),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse($messageText);
        return \Response::json((object) $data);        
    }

    /**********************************************************/
    /**
     * @OA\Post(
     *     path="/messages/forwardMessage",
     *     tags={"Messages"},
     *     operationId="forwardMessage",
     *     summary="forward message",
     *     description="forward specific message and formMe must be false",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to send to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to forward to (fromMe must be false)",in="query",name="messageId", required=true),
     * )
     */
    public function forwardMessage(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/forwardMessage?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'isForwarded' => 1,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/messages/starMessage",
     *     tags={"Messages"},
     *     operationId="starMessage",
     *     summary="star message",
     *     description="star specific message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Message Id to be starred",in="query",name="messageId", required=true),
     * )
     */
    public function starMessage(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/starMessage?id='.$name, [
            'messageId' => $input['messageId'],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = [
            'success' => true,
            'starred' => true,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Starred Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/messages/unstarMessage",
     *     tags={"Messages"},
     *     operationId="unstarMessage",
     *     summary="unstar message",
     *     description="unstar specific message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Message Id to be unstarred",in="query",name="messageId", required=true),
     * )
     */
    public function unstarMessage(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/unstarMessage?id='.$name, [
            'messageId' => $input['messageId'],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = [
            'success' => true,
            'starred' => false,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Un-Starred Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/messages/deleteMessageForMe",
     *     tags={"Messages"},
     *     operationId="deleteMessageForMe",
     *     summary="delete message for me",
     *     description="delete specific message for me",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Message Id to be deleted for me",in="query",name="messageId", required=true),
     * )
     */
    public function deleteMessageForMe(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/deleteMessageForMe?id='.$name, [
            'messageId' => $input['messageId'],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'message' => 'deleted',
        ];

        $data['status'] = \TraitsFunc::SuccessResponse("Message Deleted For Me Successfully !!!");
        return \Response::json((object) $data); 
    }
    
    /**
     * @OA\Post(
     *     path="/messages/deleteMessageForAll",
     *     tags={"Messages"},
     *     operationId="deleteMessageForAll",
     *     summary="delete message for everyone",
     *     description="delete specific message for everyone",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Message Id to be deleted for everyone",in="query",name="messageId", required=true),
     * )
     */
    public function deleteMessageForAll(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/deleteMessage?id='.$name, [
            'messageId' => $input['messageId'],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'message' => 'deleted',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Deleted Successfully !!!");
        return \Response::json((object) $data);    
    }
    
    /**
     * @OA\Post(
     *     path="/messages/repeatHook",
     *     tags={"Messages"},
     *     operationId="repeatHook",
     *     summary="repeat message webhook",
     *     description="repeat sending webhook for specific message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Message Id to be deleted for everyone",in="query",name="messageId", required=true),
     * )
     */
    public function repeatHook(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

        $response = Http::post(env('URL_WA_SERVER').'/messages/getMessageByID?id='.$name, [
            'messageId' => $input['messageId'],
        ]);
        $res = json_decode($response->getBody());
        if($res->success && $res->data && !empty($res->data)){
            $messageObj = $res->data;

            $messageArr = \Helper::formatArrayShape((array) $messageObj); 
            
            $webhooks = [];
            $deviceObj = DeviceSetting::where('sessionId',$name)->first();
            if($deviceObj){
               $webhooks = DeviceSetting::getData($deviceObj)->webhooks;
            }

            if($webhooks != null && isset($webhooks->messageNotifications) && !empty($webhooks->messageNotifications)){
                WebhookCall::create()
                   ->url($webhooks->messageNotifications)
                   ->payload([
                        'event' => 'newMessage',
                        'messages' => [(object)$messageArr]
                    ])
                   ->doNotSign()
                   ->dispatch();
            }

            $data['data'] = [
                'success' => true,
                'repeated' => true,
                'messageArr' => $messageArr,
            ];
            $data['status'] = \TraitsFunc::SuccessResponse("Webhook Repeated Successfully !!!");
            return \Response::json((object) $data); 
        }else{
            return \TraitsFunc::ErrorMessage("Can't Find This Message !!");
        }
    }

    public function formatResponse($message,$type){
        if($type == 'session exists'){
            $message = str_replace('Session','Channel Name',$message);
            $message = str_replace('id','Channel Name',$message);
        }
        return $message;
    }
}
