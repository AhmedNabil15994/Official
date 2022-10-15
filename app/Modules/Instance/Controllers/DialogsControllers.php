<?php namespace App\Http\Controllers;

use Request;
use Response;
use URL;
use DB;
use App\Models\Device;
use App\Models\DeviceSetting;
use App\Models\Channel;
use App\Models\Message;
use App\Models\Dialog;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class DialogsControllers extends Controller {

    use \TraitsFunc;

    public function formatResponse($message,$type){
        if($type == 'session exists'){
            $message = str_replace('Session','Channel Name',$message);
            $message = str_replace('id','Channel Name',$message);
        }
        return $message;
    }

    /**
     * @OA\Get(
     *     path="/chats",
     *     tags={"Chats"},
     *     operationId="chats",
     *     summary="fetch all chats",
     *     description="fetch user all chats",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description="returns array of chats."),
     *     @OA\Parameter(description="Chat Id to get specific chat",in="query",name="chatId", required=false),
     *     @OA\Parameter(description="Page Number",in="query",name="page", required=false),
     *     @OA\Parameter(description="Page Size",in="query",name="page_size", required=false),
     * )
     */
    public function fetchDialogs(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(isset($input['phone']) && !empty($input['phone'])){
            $response = Http::post(env('URL_WA_SERVER').'/chats/getChatByID?id='.$name,$input);
        }else{
            $queryString = '';
            if(isset($input['page']) && !empty($input['page'])){
                $queryString.= '&page='.$input['page'];
            }
            if(isset($input['page_size']) && !empty($input['page_size'])){
                $queryString.= '&page_size='.$input['page_size'];
            }
            $response = Http::get(env('URL_WA_SERVER').'/chats?id='.$name.$queryString);
        }

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $dialogs = [];
        if(isset($res->success) && $res->success){
            if(isset($res->data->data) && is_array($res->data->data)){
                foreach($res->data->data as $oneMessage){
                    if(isset($oneMessage->id)){
                        $dialogs[] = \Helper::formatArrayShape((array)$oneMessage);
                    }
                }
                $data['data'] = $dialogs;
                $data['pagination'] = $res->data->pagination;
            }else{
                if(isset($res->data->id)){
                    $dialogs[] = \Helper::formatArrayShape((array)$res->data);
                }
                $data['data'] = $dialogs;
            }

            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }else{
            return \TraitsFunc::ErrorMessage($res->message);
        }
    }

    /**
     * @OA\Post(
     *     path="/chats/deleteChat",
     *     tags={"Chats"},
     *     operationId="deleteChat",
     *     summary="delete chat",
     *     description="delete specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be deleted",in="query",name="phone", required=true),
     * )
     */
    public function deleteChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/deleteChat?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'deleted' => true,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat Read Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/chats/readChat",
     *     tags={"Chats"},
     *     operationId="readChat",
     *     summary="read chat",
     *     description="read specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be read",in="query",name="phone", required=true),
     * )
     */
    public function readChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/readChat?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'chatRead' => true,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat Read Successfully !!!");
        return \Response::json((object) $data);        
    }
    
    /**
     * @OA\Post(
     *     path="/chats/unreadChat",
     *     tags={"Chats"},
     *     operationId="unreadChat",
     *     summary="unread chat",
     *     description="read specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be unread",in="query",name="phone", required=true),
     * )
     */
    public function unreadChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/unreadChat?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'chatRead' => false,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat Read Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/chats/archiveChat",
     *     tags={"Chats"},
     *     operationId="archiveChat",
     *     summary="archive chat",
     *     description="archive specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be archived",in="query",name="phone", required=true),
     * )
     */
    public function archiveChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/archiveChat?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'chatArchived' => true,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat Archived Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/chats/unarchiveChat",
     *     tags={"Chats"},
     *     operationId="unarchiveChat",
     *     summary="unarchive chat",
     *     description="unarchive specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be unarchived",in="query",name="phone", required=true),
     * )
     */
    public function unarchiveChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/unarchiveChat?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
            
        $data['data'] = [
            'success' => true,
            'chatArchived' => false,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat UnArchived Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/chats/pinChat",
     *     tags={"Chats"},
     *     operationId="pinChat",
     *     summary="pin chat",
     *     description="pin specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be pinned",in="query",name="phone", required=true),
     * )
     */
    public function pinChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/pinChat?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'chatPinned' => true,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat Pinned Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/chats/unpinChat",
     *     tags={"Chats"},
     *     operationId="unpinChat",
     *     summary="unpin chat",
     *     description="unpin specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be unpinned",in="query",name="phone", required=true),
     * )
     */
    public function unpinChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/unpinChat?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
            
        $data['data'] = [
            'success' => true,
            'chatPinned' => false,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat UnPinned Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/chats/muteChat",
     *     tags={"Chats"},
     *     operationId="muteChat",
     *     summary="mute chat",
     *     description="mute specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be muted",in="query",name="phone", required=true),
     *     @OA\Parameter(description="duration of seconds that chat would be muted",in="query",name="duration", required=false),
     * )
     */
    public function muteChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['duration']) || empty($input['duration'])){
            return \TraitsFunc::ErrorMessage("Mute Duration field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/muteChat?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = [
            'success' => true,
            'chatMuted' => true,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat Muted Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/chats/unmuteChat",
     *     tags={"Chats"},
     *     operationId="unmuteChat",
     *     summary="unmute chat",
     *     description="unmute specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be unmuted",in="query",name="phone", required=true),
     * )
     */
    public function unmuteChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/unmuteChat?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
            
        $data['data'] = [
            'success' => true,
            'chatMuted' => false,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat UnMuted Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/chats/typing",
     *     tags={"Chats"},
     *     operationId="typing",
     *     summary="typing",
     *     description="set typing status to specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be notified about your status",in="query",name="phone", required=true),
     * )
     */
    public function typing(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/typing?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
            
        $data['data'] = [
            'success' => true,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat UnMuted Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/chats/recording",
     *     tags={"Chats"},
     *     operationId="recording",
     *     summary="recording",
     *     description="set recording status to specific chat",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="chat phone to be notified about your status",in="query",name="phone", required=true),
     * )
     */
    public function recording(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/chats/recording?id='.$name, $input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
            
        $data['data'] = [
            'success' => true,
            'chatId' => $input['phone'],
        ];
        $data['status'] = \TraitsFunc::SuccessResponse("Chat UnMuted Successfully !!!");
        return \Response::json((object) $data);        
    }

}
