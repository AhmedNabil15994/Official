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


class BulkControllers extends Controller {

    use \TraitsFunc;

    /**
     * @OA\Post(
     *     path="/messages/textBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="textBulk",
     *     summary="group text message",
     *     description="send group text message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     * )
     */
    public function textBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['body']) || $input['body'] == ''){
                return \TraitsFunc::ErrorMessage("Message Body field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageType' => 1,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'body' => $input['body'],
            ],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        
        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);
    }

    /**
     * @OA\Post(
     *     path="/messages/imageBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="imageBulk",
     *     summary="Group image message",
     *     description="Group image message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Image Url to send",in="query",name="url", required=true),
     *     @OA\Parameter(description="Caption to send",in="query",name="caption", required=false),
     * )
     */
    public function imageBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['url']) || empty($input['url'])){
                return \TraitsFunc::ErrorMessage("Image Url field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 2,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'url' => $input['url'],
                'caption' => isset($input['caption']) ? $input['caption']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/videoBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="videoBulk",
     *     summary="Group video message",
     *     description="Group video message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Video Url to send",in="query",name="url", required=true),
     *     @OA\Parameter(description="Caption to send",in="query",name="caption", required=false),
     * )
     */
    public function videoBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['url']) || empty($input['url'])){
                return \TraitsFunc::ErrorMessage("Video Url field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 3,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'url' => $input['url'],
                'caption' => isset($input['caption']) ? $input['caption']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);            
    }

    /**
     * @OA\Post(
     *     path="/messages/audioBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="audioBulk",
     *     summary="Group audio message",
     *     description="Group audio message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Audio Url to send",in="query",name="url", required=true),
     * )
     */
    public function audioBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['url']) || empty($input['url'])){
                return \TraitsFunc::ErrorMessage("Video Url field is required !!");
            }
        }

        $fileName = 'soundFile'.time();
        $extension = '.'.array_reverse(explode('.',$input['url']))[0];
        $path = public_path().'/uploads/temp/'.$fileName;
        file_put_contents($path.$extension, fopen($input['url'], 'r'));

        // shell_exec("ffmpeg -i ".$path.$extension." -ac 1 -c:a libopus -b:a 64k  -ar 48000 ".$path.".oga");
        shell_exec("/usr/bin/ffmpeg -i ".$path.$extension." -ac 1 -c:a libopus -b:a 64k  -ar 48000 ".$path.".oga");
       
        $input['url'] = \URL::to('/').'/uploads/temp/'.$fileName.'.oga';

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageType' => 4,
            'messageData' => [
                'url' => $input['url'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);              
    }

    /**
     * @OA\Post(
     *     path="/messages/fileBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="fileBulk",
     *     summary="Group file message",
     *     description="Group file message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="File Url to send",in="query",name="url", required=true),
     * )
     */
    public function fileBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['url']) || empty($input['url'])){
                return \TraitsFunc::ErrorMessage("Video Url field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 5,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'url' => $input['url'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);               
    }

    /**
     * @OA\Post(
     *     path="/messages/stickerBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="stickerBulk",
     *     summary="Group sticker message",
     *     description="Group sticker message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Sticker Url to send",in="query",name="url", required=true),
     * )
     */
    public function stickerBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['url']) || empty($input['url'])){
                return \TraitsFunc::ErrorMessage("Video Url field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 6,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'url' => $input['url'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/gifBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="gifBulk",
     *     summary="Group gif message",
     *     description="Group gif message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Gif Url to send",in="query",name="url", required=true),
     *     @OA\Parameter(description="Caption to send",in="query",name="caption", required=false),
     * )
     */
    public function gifBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['url']) || empty($input['url'])){
                return \TraitsFunc::ErrorMessage("Video Url field is required !!");
            }
        }

        $fileName = 'gifFile'.time();
        $extension = '.'.array_reverse(explode('.',$input['url']))[0];
        $path = public_path().'/uploads/temp/'.$fileName;
        file_put_contents($path.$extension, fopen($input['url'], 'r'));

        shell_exec("ffmpeg -i ".$path.$extension.' -movflags faststart -pix_fmt yuv420p -vf "scale=trunc(iw/2)*2:trunc(ih/2)*2" '.$path.".mp4");
       
        $input['url'] = \URL::to('/').'/uploads/temp/'.$fileName.'.mp4';

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageType' => 7,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'url' => $input['url'],
                'caption' => isset($input['caption']) ? $input['caption']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);           
    }

    /**
     * @OA\Post(
     *     path="/messages/locationBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="locationBulk",
     *     summary="Group location message",
     *     description="Group location message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Location latitude to send",in="query",name="latitude", required=true),
     *     @OA\Parameter(description="Location Longitude to send",in="query",name="longitude", required=false),
     *     @OA\Parameter(description="Location Address Text to send",in="query",name="address", required=false),
     * )
     */
    public function locationBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['latitude']) || empty($input['latitude'])){
                return \TraitsFunc::ErrorMessage("Location latitude field is required !!");
            }

            if(!isset($input['longitude']) || empty($input['longitude'])){
                return \TraitsFunc::ErrorMessage("Location longitude field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'phones' => $input['phones'],
            'messageType' => 8,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'lat' => $input['latitude'],
                'lng' => $input['longitude'],
                'address' => isset($input['address']) ? $input['address']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/contactBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="contactBulk",
     *     summary="Group contact message",
     *     description="Group contact message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Contact Name to send",in="query",name="name", required=true),
     *     @OA\Parameter(description="Contact Phone to send",in="query",name="contact", required=false),
     *     @OA\Parameter(description="Contact Organization to send",in="query",name="organization", required=false),
     * )
     */
    public function contactBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['name']) || empty($input['name'])){
                return \TraitsFunc::ErrorMessage("Contact Name field is required !!");
            }

            if(!isset($input['contact']) || empty($input['contact'])){
                return \TraitsFunc::ErrorMessage("Contact Mobile field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 9,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'name' => $input['name'],
                'contact' => $input['contact'],
                'organization' => isset($input['organization']) ? $input['organization']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);          
    }

    /**
     * @OA\Post(
     *     path="/messages/disappearingBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="disappearingBulk",
     *     summary="Group disappearing message",
     *     description="Group disappearing message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Expiration in seconds",in="query",name="expiration", required=false),
     * )
     */
    public function disappearingBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['body']) || $input['body'] == ''){
                return \TraitsFunc::ErrorMessage("Message Body field is required !!");
            }

            if(!isset($input['expiration']) || empty($input['expiration'])){
                return \TraitsFunc::ErrorMessage("Message Expiration field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 10,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'body' => $input['body'],
                'expiration' => $input['expiration'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);          
    }

    /**
     * @OA\Post(
     *     path="/messages/mentionBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="mentionBulk",
     *     summary="Group mention message",
     *     description="Group mention message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Contact Mention to send",in="query",name="contact", required=true),
     * )
     */
    public function mentionBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['contact']) || empty($input['contact'])){
                return \TraitsFunc::ErrorMessage("Contact Mention field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageType' => 11,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'contact' => $input['contact'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/messages/buttonsBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="buttonsBulk",
     *     summary="Group buttons message",
     *     description="Group buttons message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Footer to send",in="query",name="footer", required=true),
     *     @OA\Parameter(description="Message Buttons to send",in="query",name="buttons", required=true),
     *     @OA\Parameter(description="Message Image URL to send",in="query",name="image", required=false),
     * )
     */
    public function buttonsBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(empty($input)){
            return \TraitsFunc::ErrorMessage("Raw data field is required !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['body']) || $input['body'] == ''){
                return \TraitsFunc::ErrorMessage("Message Body field is required !!");
            }

            if(!isset($input['footer']) || $input['footer'] == ''){
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

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 13,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
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

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/templateBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="templateBulk",
     *     summary="Group template message",
     *     description="Group template message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Footer to send",in="query",name="footer", required=true),
     *     @OA\Parameter(description="Message Buttons to send",in="query",name="buttons", required=true),
     *     @OA\Parameter(description="Message Image URL to send",in="query",name="image", required=false),
     * )
     */
    public function templateBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(empty($input)){
            return \TraitsFunc::ErrorMessage("Raw data field is required !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['body']) || $input['body'] == ''){
                return \TraitsFunc::ErrorMessage("Message Body field is required !!");
            }

            if(!isset($input['footer']) || $input['footer'] == ''){
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

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 14,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
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

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/listBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="listBulk",
     *     summary="Group list message",
     *     description="Group list message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Message Title to send",in="query",name="title", required=true),
     *     @OA\Parameter(description="Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Message Footer to send",in="query",name="footer", required=true),
     *     @OA\Parameter(description="Message View list button Text to send",in="query",name="buttonText", required=true),
     *     @OA\Parameter(description="Message Sections to send",in="query",name="sections", required=true),
     * )
     */
    public function listBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(empty($input)){
            return \TraitsFunc::ErrorMessage("Raw data field is required !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){

            if(!isset($input['body']) || $input['body'] == ''){
                return \TraitsFunc::ErrorMessage("Message Body field is required !!");
            }

            if(!isset($input['footer']) || $input['footer'] == ''){
                return \TraitsFunc::ErrorMessage("Message Footer field is required !!");
            }

            if(!isset($input['title']) || $input['title'] == ''){
                return \TraitsFunc::ErrorMessage("Message Title field is required !!");
            }

            if(!isset($input['buttonText']) || $input['buttonText'] == ''){
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
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 15,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
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

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/messages/linkBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="linkBulk",
     *     summary="Group link with preview message",
     *     description="Group link with preview message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Message URL to send",in="query",name="url", required=true),
     *     @OA\Parameter(description="Message URL title to send",in="query",name="title", required=true),
     *     @OA\Parameter(description="Message URL description to send",in="query",name="description", required=false),
     * )
     */
    public function linkBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['url']) || empty($input['url'])){
                return \TraitsFunc::ErrorMessage("URL field is required !!");
            }

            if(!isset($input['title']) || empty($input['title'])){
                return \TraitsFunc::ErrorMessage("URL title field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 16,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'url' => $input['url'],
                'title' => $input['title'],
                'body' => isset($input['description']) ? $input['description']: '',
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);            
    }

    /**
     * @OA\Post(
     *     path="/messages/groupInvitationBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="groupInvitationBulk",
     *     summary="Group group invitation message",
     *     description="Group group invitation message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Group Id to send",in="query",name="groupId", required=true),
     * )
     */
    public function groupInvitationBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['groupId']) || empty($input['groupId'])){
                return \TraitsFunc::ErrorMessage("Group Id field is required !!");
            }
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 17,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'groupId' => $input['groupId'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/productBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="productBulk",
     *     summary="Group product message",
     *     description="Group product message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Product Id to send",in="query",name="productId", required=true),
     * )
     */
    public function productBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['productId']) || empty($input['productId'])){
                return \TraitsFunc::ErrorMessage("URL field is required !!");
            }
        }
        
        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'messageType' => 18,
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'productId' => $input['productId'],
            ],
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/messages/catalogBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="catalogBulk",
     *     summary="Group catalog message",
     *     description="Group catalog message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     * )
     */
    public function catalogBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageType' => 19,
            'messageData' => "{}",
        ]);

        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);           
    }

    /**
     * @OA\Post(
     *     path="/messages/pollBulk",
     *     tags={"Group Messages With Interval"},
     *     operationId="pollBulk",
     *     summary="group poll message",
     *     description="send group poll message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Phones to send to",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Interval between every message in seconds",in="query",name="interval", required=false),
     *     @OA\Parameter(description="Poll Message Body to send",in="query",name="body", required=true),
     *     @OA\Parameter(description="Poll Message Selectable Options Count",in="query",name="selectableOptionsCount",),
     *     @OA\Parameter(description="Poll Message Options to send",in="query",name="options", required=true),
     * )
     */
    public function pollBulk(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phones']) || empty($input['phones']))){
            return \TraitsFunc::ErrorMessage("Receivers Phones field is required !!");
        }

        if(!isset($input['messageData'])){
            if(!isset($input['body']) || $input['body'] == ''){
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
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/messages/sendGroupMessage?id='.$name, [
            'phones' => $input['phones'],
            'interval' => isset($input['interval']) && !empty($input['interval']) ? ($input['interval'] < 5 ? 5 : $input['interval']) : 5,
            'messageType' => 20,
            'messageData' => isset($input['messageData']) && !empty($input['messageData']) ? $input['messageData'] : [
                'body' => $input['body'],
                'selectableOptionsCount' => $input['selectableOptionsCount'],
                'options' => $input['options'],
            ],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        
        $data['data'] = [
            'success' => true,
            'message' => $res->message
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Message Sent Successfully !!!");
        return \Response::json((object) $data);
    }
}
