<?php namespace App\Http\Controllers;

use Request;
use Response;
use URL;
use DB;
use App\Models\Device;
use App\Models\DeviceSetting;
use App\Models\Channel;
use App\Models\Dialog;
use App\Models\Message;
use Illuminate\Support\Facades\Http;

class ChatUserControllers extends Controller {

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
     *     path="/users/contacts",
     *     tags={"Users"},
     *     operationId="contacts",
     *     summary="fetch user data",
     *     description="fetch connected user data",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description="returns contacts object."),
     *     @OA\Parameter(description="Contact Id to get specific contact",in="query",name="phone", required=false),
     *     @OA\Parameter(description="Page Number",in="query",name="page", required=false),
     *     @OA\Parameter(description="Page Size",in="query",name="page_size", required=false),
     * )
     */
    public function contacts(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }
      
        $settingObj = DeviceSetting::where('sessionId',NAME)->first();

        if(isset($input['phone']) && !empty($input['phone'])){
            $response = Http::post(env('URL_WA_SERVER').'/instances/contacts/getContactByID?id='.$name,$input);
        }else{
            $queryString = '';
            if(isset($input['page']) && !empty($input['page'])){
                $queryString.= '&page='.$input['page'];
            }
            if(isset($input['page_size']) && !empty($input['page_size'])){
                $queryString.= '&page_size='.$input['page_size'];
            }
            $response = Http::get(env('URL_WA_SERVER').'/instances/contacts?id='.$name.$queryString);
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
                        $oneMessage->id = str_replace('s.whatsapp.net','c.us',$oneMessage->id);
                        $messages[] = \Helper::formatArrayShape((array)$oneMessage);
                    }
                }
                $data['data'] = $messages;
                $data['pagination'] = $res->data->pagination;
            }else{
                if(isset($res->data->id)){
                    $messages[] = \Helper::formatArrayShape((array)$res->data);
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
     * @OA\Get(
     *     path="/users/checkPhone",
     *     tags={"Users"},
     *     operationId="checkPhone",
     *     summary="check whatsapp availability",
     *     description="check if phone has whatsapp or no",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Phone to get whatsapp availability",in="query",name="phone", required=true),
     * )
     */
    public function checkPhone(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/users/checkPhone?id='.$name, ['phone' => $input['phone']]);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $exists = false;
        if(isset($res->success) && $res->success){
            if($res->data[0]->exists){
                $exists = true;
            }
        }
        $data['data'] = ['exists' => $exists];
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Get(
     *     path="/users/getUserStatus",
     *     tags={"Users"},
     *     operationId="getUserStatus",
     *     summary="fetch specific user status",
     *     description="check if phone has whatsapp or no",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Phone to get status",in="query",name="phone", required=true),
     * )
     */
    public function getUserStatus(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/users/status?id='.$name, ['phone' => $input['phone']]);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Get(
     *     path="/users/getUserPresence",
     *     tags={"Users"},
     *     operationId="getUserPresence",
     *     summary="fetch specific user presence",
     *     description="check if phone has whatsapp or no",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Phone to get presence",in="query",name="phone", required=true),
     * )
     */
    public function getUserPresence(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/users/presence?id='.$name, ['phone' => $input['phone']]);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Get(
     *     path="/users/getUserPicture",
     *     tags={"Users"},
     *     operationId="getUserPicture",
     *     summary="fetch specific user profile picture",
     *     description="check if phone has whatsapp or no",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Phone to get profile picture",in="query",name="phone", required=true),
     * )
     */
    public function getUserPicture(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/users/profilePicture?id='.$name, ['phone' => $input['phone']]);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }
    
    /**
     * @OA\Get(
     *     path="/users/blockList",
     *     tags={"Users"},
     *     operationId="blockList",
     *     summary="fetch specific user block list",
     *     description="check if phone has whatsapp or no",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     * )
     */
    public function blockList(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        $response = Http::get(env('URL_WA_SERVER').'/users/blockList?id='.$name);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messages = [];
        if(isset($res->success) && $res->success){
            if(is_array($res->data)){
                foreach($res->data as $oneMessage){
                    $messages[] = str_replace('s.whatsapp.net','c.us',$oneMessage);
                }
            }else{
                $messages[] = str_replace('s.whatsapp.net','c.us',$res->data);
            }

            $data['data'] = $messages;
            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }else{
            return \TraitsFunc::ErrorMessage($res->message);
        }
    }   

    /**
     * @OA\Post(
     *     path="/users/blockUser",
     *     tags={"Users"},
     *     operationId="blockUser",
     *     summary="block user",
     *     description="block specific user",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Phone to block user",in="query",name="phone", required=true),
     * )
     */
    public function blockUser(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/users/blockUser?id='.$name,$input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }   

    /**
     * @OA\Post(
     *     path="/users/unblockUser",
     *     tags={"Users"},
     *     operationId="unblockUser",
     *     summary="unblock user",
     *     description="unblock specific user",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Phone to unblock user",in="query",name="phone", required=true),
     * )
     */
    public function unblockUser(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/users/unblockUser?id='.$name,$input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }   

    /**
     * @OA\Post(
     *     path="/users/rejectCall",
     *     tags={"Users"},
     *     operationId="rejectCall",
     *     summary="reject call",
     *     description="reject incoming call from specific user",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Phone to unblock user",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Call ID to reject",in="query",name="callId", required=true),
     * )
     */
    public function rejectCall(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }

        if(!isset($input['callId']) || empty($input['callId'])){
            return \TraitsFunc::ErrorMessage("Call ID field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/users/rejectCall?id='.$name,$input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }   
}
