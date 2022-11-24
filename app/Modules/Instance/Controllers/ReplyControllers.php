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


class ReplyControllers extends Controller {

    use \TraitsFunc;

    /**
     * @OA\Post(
     *     path="/messages/textReply",
     *     tags={"Reply With Message"},
     *     operationId="textReply",
     *     summary="reply with text message",
     *     description="reply with text message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Body to reply with",in="query",name="body", required=true),
     * )
     */
    public function textReply(){
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

        if(!isset($input['body']) || empty($input['body'])){
            return \TraitsFunc::ErrorMessage("Message Body field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 1,
            'messageData' => [
                'body' => $input['body'],
            ],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');
        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.$chatId.'_'. (isset($res->data->key) ? $res->data->key->id : $res->data),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);             
    }

    /**
     * @OA\Post(
     *     path="/messages/imageReply",
     *     tags={"Reply With Message"},
     *     operationId="imageReply",
     *     summary="reply with image message",
     *     description="reply with image message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Image Url to reply with",in="query",name="url", required=true),
     *     @OA\Parameter(description="Caption to reply with",in="query",name="caption", required=false),
     * )
     */
    public function imageReply(){
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

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Image Url field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 2,
            'messageData' => [
                'url' => $input['url'],
                'caption' => isset($input['caption']) ? $input['caption']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $mimetype = $res->data->message->imageMessage->mimetype;
        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');
        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.$chatId.'_'. (isset($res->data->key) ? $res->data->key->id : $res->data),
            'image' => $fileURL,
            'caption' => isset($input['caption']) && !empty($input['caption']) ? $input['caption'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);             
    }

    /**
     * @OA\Post(
     *     path="/messages/videoReply",
     *     tags={"Reply With Message"},
     *     operationId="videoReply",
     *     summary="reply with video message",
     *     description="reply with video message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Video Url to reply with",in="query",name="url", required=true),
     *     @OA\Parameter(description="Caption to reply with",in="query",name="caption", required=false),
     * )
     */
    public function videoReply(){
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

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Video Url field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 3,
            'messageData' => [
                'url' => $input['url'],
                'caption' => isset($input['caption']) ? $input['caption']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $mimetype = $res->data->message->videoMessage->mimetype;
        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');
        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.$chatId.'_'. (isset($res->data->key) ? $res->data->key->id : $res->data),
            'video' => $fileURL,
            'caption' => isset($input['caption']) && !empty($input['caption']) ? $input['caption'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);             
    }

    /**
     * @OA\Post(
     *     path="/messages/audioReply",
     *     tags={"Reply With Message"},
     *     operationId="audioReply",
     *     summary="reply with audio message",
     *     description="reply with audio message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Audio Url to reply with",in="query",name="url", required=true),
     * )
     */
    public function audioReply(){
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

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Video Url field is required !!");
        }

        $fileName = 'soundFile'.time();
        $extension = '.'.array_reverse(explode('.',$input['url']))[0];
        $path = public_path().'/uploads/temp/'.$fileName;
        file_put_contents($path.$extension, fopen($input['url'], 'r'));

        // shell_exec("ffmpeg -i ".$path.$extension." -ac 1 -c:a libopus -b:a 64k  -ar 48000 ".$path.".oga");
        shell_exec("/var/www/official/vendor/ffmpeg/ffmpeg -i ".$path.$extension." -ac 1 -c:a libopus -b:a 64k  -ar 48000 ".$path.".oga");
       
        $input['url'] = \URL::to('/').'/uploads/temp/'.$fileName.'.oga';

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 4,
            'messageData' => [
                'url' => $input['url'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $mimetype = $res->data->message->audioMessage->mimetype;
        $extension = explode('/', $mimetype)[1];
        $extension = explode(';', $extension)[0];
        $extension = $extension == 'ogg' ? 'oga' : $extension;

        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.$extension;
        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.$chatId.'_'. (isset($res->data->key) ? $res->data->key->id : $res->data),
            'audio' => $fileURL,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);             
    }

    /**
     * @OA\Post(
     *     path="/messages/fileReply",
     *     tags={"Reply With Message"},
     *     operationId="fileReply",
     *     summary="reply with file message",
     *     description="reply with file message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="File Url to reply with",in="query",name="url", required=true),
     * )
     */
    public function fileReply(){
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

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Video Url field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 5,
            'messageData' => [
                'url' => $input['url'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $mimetype = $res->data->message->documentMessage->mimetype;
        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');
        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.$chatId.'_'. (isset($res->data->key) ? $res->data->key->id : $res->data),
            'file' => $fileURL,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);             
    }

    /**
     * @OA\Post(
     *     path="/messages/stickerReply",
     *     tags={"Reply With Message"},
     *     operationId="stickerReply",
     *     summary="reply with sticker message",
     *     description="reply with sticker message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Sticker Url to reply with",in="query",name="url", required=true),
     * )
     */
    public function stickerReply(){
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

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Video Url field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 6,
            'messageData' => [
                'url' => $input['url'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $mimetype = $res->data->message->stickerMessage->mimetype;
        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];

        $data['data'] = [
            'success' => true,
            'chatId' => str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid),
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'sticker' => $fileURL,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/gifReply",
     *     tags={"Reply With Message"},
     *     operationId="gifReply",
     *     summary="reply with gif message",
     *     description="reply with gif message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Video Url to reply with",in="query",name="url", required=true),
     *     @OA\Parameter(description="Caption to reply with",in="query",name="caption", required=false),
     * )
     */
    public function gifReply(){
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

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("Video Url field is required !!");
        }

        $fileName = 'gifFile'.time();
        $extension = '.'.array_reverse(explode('.',$input['url']))[0];
        $path = public_path().'/uploads/temp/'.$fileName;
        file_put_contents($path.$extension, fopen($input['url'], 'r'));

        shell_exec("ffmpeg -i ".$path.$extension.' -movflags faststart -pix_fmt yuv420p -vf "scale=trunc(iw/2)*2:trunc(ih/2)*2" '.$path.".mp4");
       
        $input['url'] = \URL::to('/').'/uploads/temp/'.$fileName.'.mp4';

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 7,
            'messageData' => [
                'url' => $input['url'],
                'caption' => isset($input['caption']) ? $input['caption']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $mimetype = $res->data->message->videoMessage->mimetype;
        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $fileURL = config('app.IMAGE_URL').'messages/'.str_replace('wlChannel','',$name).'/'.$res->data->key->id.'.'.explode('/', $mimetype)[1];

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'gif' => $fileURL,
            'caption' => isset($input['caption']) && !empty($input['caption']) ? $input['caption'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/locationReply",
     *     tags={"Reply With Message"},
     *     operationId="locationReply",
     *     summary="reply with location message",
     *     description="reply with location message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Location latitude to reply with",in="query",name="latitude", required=true),
     *     @OA\Parameter(description="Location Longitude to reply with",in="query",name="longitude", required=false),
     *     @OA\Parameter(description="Location Address Text to reply with",in="query",name="address", required=false),
     * )
     */
    public function locationReply(){
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

        if(!isset($input['latitude']) || empty($input['latitude'])){
            return \TraitsFunc::ErrorMessage("Location latitude field is required !!");
        }

        if(!isset($input['longitude']) || empty($input['longitude'])){
            return \TraitsFunc::ErrorMessage("Location longitude field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 8,
            'messageData' => [
                'lat' => $input['latitude'],
                'lng' => $input['longitude'],
                'address' => isset($input['address']) ? $input['address']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'latitude' => $input['latitude'],
            'longitude' => $input['longitude'],
            'address' => isset($input['address']) && !empty($input['address']) ? $input['address'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/contactReply",
     *     tags={"Reply With Message"},
     *     operationId="contactReply",
     *     summary="reply with contact message",
     *     description="reply with contact message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Contact Name to reply with",in="query",name="name", required=true),
     *     @OA\Parameter(description="Contact Phone to reply with",in="query",name="contact", required=false),
     *     @OA\Parameter(description="Contact Organization to reply with",in="query",name="organization", required=false),
     * )
     */
    public function contactReply(){
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

        if(!isset($input['name']) || empty($input['name'])){
            return \TraitsFunc::ErrorMessage("Contact Name field is required !!");
        }

        if(!isset($input['contact']) || empty($input['contact'])){
            return \TraitsFunc::ErrorMessage("Contact Mobile field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 9,
            'messageData' => [
                'name' => $input['name'],
                'contact' => $input['contact'],
                'organization' => isset($input['organization']) ? $input['organization']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'name' => $input['name'],
            'contact' => $input['contact'],
            'organization' => isset($input['organization']) && !empty($input['organization']) ? $input['organization'] : '',
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/disappearingReply",
     *     tags={"Reply With Message"},
     *     operationId="disappearingReply",
     *     summary="reply with disappearing message",
     *     description="reply with disappearing message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Message Body to reply with",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Expiration in seconds",in="query",name="expiration", required=false),
     * )
    */
    public function disappearingReply(){
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

        if(!isset($input['body']) || empty($input['body'])){
            return \TraitsFunc::ErrorMessage("Message Body field is required !!");
        }

        if(!isset($input['expiration']) || empty($input['expiration'])){
            return \TraitsFunc::ErrorMessage("Message Expiration field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 10,
            'messageData' => [
                'body' => $input['body'],
                'expiration' => $input['expiration'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/mentionReply",
     *     tags={"Reply With Message"},
     *     operationId="mentionReply",
     *     summary="reply with mention message",
     *     description="reply with mention message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Contact Mention to reply with",in="query",name="contact", required=true),
     * )
    */
    public function mentionReply(){
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

        if(!isset($input['contact']) || empty($input['contact'])){
            return \TraitsFunc::ErrorMessage("Contact Mention field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 11,
            'messageData' => [
                'contact' => $input['contact'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'mention' => $input['contact'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/reactionReply",
     *     tags={"Reply With Message"},
     *     operationId="reactionReply",
     *     summary="reply with reaction message",
     *     description="reply with reaction message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Reaction Index to reply with (1 == '👍' , 2 == '❤️' , 3 == '😂', 4 == '😮' , 5 == '😢' , 6 == '🙏' , 7 == to removed messages reactions)",in="query",name="reaction", required=true),
     * )
    */
    public function reactionReply(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['reaction']) || empty($input['reaction'])){
            return \TraitsFunc::ErrorMessage("Reaction Index field is required !!");
        }

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 12,
            'messageData' => [
                'reaction' => $input['reaction'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
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
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
            'reactionIndex' => $input['reaction'],
            'reaction' => $reaction,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/buttonsReply",
     *     tags={"Reply With Message"},
     *     operationId="buttonsReply",
     *     summary="reply with buttons message",
     *     description="reply with buttons message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Message Body to reply with",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Footer to reply with",in="query",name="footer", required=true),
     *     @OA\Parameter(description="Message Buttons to reply with",in="query",name="buttons", required=true),
     *     @OA\Parameter(description="Message Image URL to reply with",in="query",name="image", required=false),
     * )
    */
    public function buttonsReply(){
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

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

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

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 13,
            'messageData' => [
                'body' => $input['body'],
                'footer' => $input['footer'],
                'hasImage' => $input['hasImage'],
                'imageURL' => $input['imageURL'],
                'buttons' => $input['buttons'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$res->data->key->remoteJid).'_'.$res->data->key->id,
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/templateReply",
     *     tags={"Reply With Message"},
     *     operationId="templateReply",
     *     summary="reply with template message",
     *     description="reply with template message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Message Body to reply with",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Footer to reply with",in="query",name="footer", required=true),
     *     @OA\Parameter(description="Message Buttons to reply with",in="query",name="buttons", required=true),
     *     @OA\Parameter(description="Message Image URL to reply with",in="query",name="image", required=false),
     * )
    */
    public function templateReply(){
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

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

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

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 14,
            'messageData' => [
                'body' => $input['body'],
                'footer' => $input['footer'],
                'hasImage' => $input['hasImage'],
                'imageURL' => $input['imageURL'],
                'buttons' => $input['buttons'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$chatId).'_'.(isset($res->data->key) ? $res->data->key->id : $res->data ),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/listReply",
     *     tags={"Reply With Message"},
     *     operationId="listReply",
     *     summary="reply with list message",
     *     description="reply with list message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Message Title to reply with",in="query",name="title", required=true),
     *     @OA\Parameter(description="Message Body to reply with",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Footer to reply with",in="query",name="footer", required=true),
     *     @OA\Parameter(description="Message View list button Text to reply with",in="query",name="buttonText", required=true),
     *     @OA\Parameter(description="Message Sections to reply with",in="query",name="sections", required=true),
     * )
    */
    public function listReply(){
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

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

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

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 15,
            'messageData' => [
                'title' => $input['title'],
                'body' => $input['body'],
                'footer' => $input['footer'],
                'buttonText' => $input['buttonText'],
                'sections' => $input['sections'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');
        
        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$chatId).'_'.(isset($res->data->key) ? $res->data->key->id : $res->data ),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/linkReply",
     *     tags={"Reply With Message"},
     *     operationId="linkReply",
     *     summary="reply with link with preview message",
     *     description="reply with link with preview message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Message URL to reply with",in="query",name="url", required=true),
     *     @OA\Parameter(description="Message URL title to reply with",in="query",name="title", required=true),
     *     @OA\Parameter(description="Message URL description to reply with",in="query",name="description", required=false),
     * )
    */
    public function linkReply(){
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

        if(!isset($input['url']) || empty($input['url'])){
            return \TraitsFunc::ErrorMessage("URL field is required !!");
        }

        if(!isset($input['title']) || empty($input['title'])){
            return \TraitsFunc::ErrorMessage("URL title field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 16,
            'messageData' => [
                'url' => $input['url'],
                'title' => $input['title'],
                'body' => isset($input['description']) ? $input['description']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$chatId).'_'.(isset($res->data->key) ? $res->data->key->id : $res->data ),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/groupInvitationReply",
     *     tags={"Reply With Message"},
     *     operationId="groupInvitationReply",
     *     summary="reply with group invitation message",
     *     description="reply with group invitation message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Group Id to reply with",in="query",name="groupId", required=true),
     * )
    */
    public function groupInvitationReply(){
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

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group Id field is required !!");
        }


        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 17,
            'messageData' => [
                'groupId' => $input['groupId'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$chatId).'_'.(isset($res->data->key) ? $res->data->key->id : $res->data ),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/productReply",
     *     tags={"Reply With Message"},
     *     operationId="productReply",
     *     summary="reply with product message",
     *     description="reply with product message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Product Id to reply with",in="query",name="productId", required=true),
     * )
    */
    public function productReply(){
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

        if(!isset($input['productId']) || empty($input['productId'])){
            return \TraitsFunc::ErrorMessage("URL field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 18,
            'messageData' => [
                'productId' => $input['productId'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$chatId).'_'.(isset($res->data->key) ? $res->data->key->id : $res->data ),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/catalogReply",
     *     tags={"Reply With Message"},
     *     operationId="catalogReply",
     *     summary="reply with catalog message",
     *     description="reply with catalog message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     * )
    */
    public function catalogReply(){
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

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 19,
            'messageData' => "{}",
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$chatId).'_'.(isset($res->data->key) ? $res->data->key->id : $res->data ),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/pollReply",
     *     tags={"Reply With Message"},
     *     operationId="pollReply",
     *     summary="reply with poll message",
     *     description="reply with poll message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phone to reply to",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Message Id to reply to (fromMe must be false)",in="query",name="messageId", required=true),
     *     @OA\Parameter(description="Poll Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Poll Message Selectable Options Count",in="query",name="selectableOptionsCount",),
     *     @OA\Parameter(description="Poll Message Options to send",in="query",name="options", required=true),
     * )
    */
    public function pollReply(){
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

        if(!isset($input['body']) || empty($input['body'])){
            return \TraitsFunc::ErrorMessage("Message Body field is required !!");
        }

        if((!isset($input['selectableOptionsCount']) || empty($input['selectableOptionsCount']))){
            $input['selectableOptionsCount'] = 0;
        }else{
            $input['selectableOptionsCount'] = (int)$input['selectableOptionsCount'];
        }

        if(!isset($input['options']) || empty($input['options'])){
            return \TraitsFunc::ErrorMessage("Message Options field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendReply?id='.$name, [
            'phone' => $input['phone'],
            'messageId' => $input['messageId'],
            'messageType' => 20,
            'messageData' => [
                'body' => $input['body'],
                'selectableOptionsCount' => $input['selectableOptionsCount'],
                'options' => $input['options'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $chatId = str_replace('@s.whatsapp.net','@c.us',isset($res->data->key) ? $res->data->key->remoteJid : $input['phone'].'@s.whatsapp.net');

        $data['data'] = [
            'success' => true,
            'chatId' => $chatId,
            'id' => 'true_'.str_replace('@s.whatsapp.net','@c.us',$chatId).'_'.(isset($res->data->key) ? $res->data->key->id : $res->data ),
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Reply Sent Successfully !!!");
        return \Response::json((object) $data);        
    }
}
