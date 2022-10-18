<?php namespace App\Http\Controllers;

use Request;
use Response;
use URL;
use DB;
use App\Models\Device;
use App\Models\Dialog;
use App\Models\Message;
use App\Models\DeviceSetting;
use App\Models\OfflineMessage;
use App\Models\Channel;
use App\Events\QRScanned;
use Illuminate\Support\Facades\Http;

class InstancesControllers extends Controller {

    use \TraitsFunc;
    /**
     * @OA\Info(title="Whatsapp Api", version="1.0"),
    **/
    public function formatResponse($message,$type){
        if($type == 'session exists'){
            $message = str_replace('Session','Channel Name',$message);
            $message = str_replace('id','Channel Name',$message);
        }
        return $message;
    }

    /**
     * @OA\Get(
     *     path="/instances/qr",
     *     tags={"Instances"},
     *     operationId="qr",
     *     summary="fetch qr",
     *     description="fetch user a new qr or return connected as status if connection established",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     
     *     @OA\Response(response="200", description="returns qr image base64 or connected.")
     * )
     */
    public function qr(){
        $name = NAME;
        $find = Http::get(env('URL_WA_SERVER').'/sessions/status/'.$name);
        $cek = json_decode($find->getBody());
        if($cek->message == "" && in_array($cek->data->status,['authenticated','connected'])){
            Device::NotDeleted()->where('name', $name)->update(['status' => 'connected','updated_at' => date('Y-m-d H:i:s')]);
            $data['data']['qr'] = 'connected';        
            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }
        
        $deviceObj = Device::NotDeleted()->where('name',$name)->first();
        if($deviceObj->multidevice == "YES"){
            $islegacy = "false"; 
        }else{
            $islegacy = "true"; 
        }
        $response = Http::post(env('URL_WA_SERVER').'/sessions/add', ['id' => $name, 'isLegacy' => $islegacy]);
        $res = json_decode($response->getBody());
        if(!$res->success){
            $image = $deviceObj->image;
        }else{
            $image = $res->data->qr;
            $deviceObj->status = null;
            $deviceObj->image = $image;
            $deviceObj->save();
        }

        $fileName = $name.time().'.png';
        file_put_contents(public_path().'/uploads/qrImages/'.$fileName, file_get_contents($image));
        $url = \URL::to('/').'/uploads/qrImages/'.$fileName;

        $logo = asset('assets/images/HtmlToSvg.png');

        $newUrl = \ImageHelper::changeQR([
            'qr' => $url,
            'logo' => $logo, 
        ]);
        $image = $newUrl;
        
        $deviceObj->image = $image;
        $deviceObj->save();
        
        $data['data']['qr'] = $image;        
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }
   
    /**
     * @OA\Get(
     *     path="/instances/status",
     *     tags={"Instances"},
     *     operationId="status",
     *     summary="fetch qr",
     *     description="fetch user connection status",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     
     *     @OA\Response(response="200", description="returns disconnected or connected.")
     * )
     */
    public function status(){
        $name = NAME;
        $input = \Request::all();

        if(isset($input['status']) && !empty($input['status']) && in_array($input['status'], ['connected','authenticated','disconnected'])){
            $devObj = Device::NotDeleted()->where('name', $name)->first();
            $devObj->update(['status' => $input['status'],'updated_at' => date('Y-m-d H:i:s')]);
            if(in_array($input['status'], ['connected','authenticated'])){
                QRScanned::dispatch($devObj);
            }
        }else{
            $find = Http::get(env('URL_WA_SERVER').'/sessions/status/'.$name);
            $cek = json_decode($find->getBody());
            if($cek->message == "" && in_array($cek->data->status , ['connected','authenticated'])){
                Device::NotDeleted()->where('name', $name)->update(['status' => 'connected','updated_at' => date('Y-m-d H:i:s')]);
                $data['data']['status'] = 'connected';        
            }else{
                $find = Http::get(env('URL_WA_SERVER').'/sessions/find/'.$name);
                $cek = json_decode($find->getBody());
                if($cek->message == "Session found."){
                    $data['data']['status'] = 'got QR and ready to scan';        
                    Device::NotDeleted()->where('name', $name)->update(['status' => 'got QR and ready to scan','updated_at' => date('Y-m-d H:i:s')]);
                }else{
                    $data['data']['status'] = 'disconnected';        
                    Device::NotDeleted()->where('name', $name)->update(['status' => 'disconnected','updated_at' => date('Y-m-d H:i:s')]);
                    $response = Http::post(env('URL_WA_SERVER').'/sessions/add', ['id' => $name, 'isLegacy' => 'true']);
                    $res = json_decode($response->getBody());
                }
            }
        }

        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }
     
    /**
     * @OA\Post(
     *     path="/instances/disconnect",
     *     tags={"Instances"},
     *     operationId="disconnect",
     *     summary="disconnect connection",
     *     description="disconnect user current connection",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     
     *     @OA\Response(response="200", description="returns Disconnected.")
     * )
     */
    public function disconnect(){
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if($deviceObj->status != 'connected'){
            return \TraitsFunc::ErrorMessage("Account Status isn't equal to connected !!");
        }
        
        $find = Http::delete(env('URL_WA_SERVER').'/sessions/delete/'.$name);
        $deviceObj->status = 'disconnected';
        $deviceObj->image = null;
        $deviceObj->save();
        
        $data['data'] = 'Disconnected';
        $data['status'] = \TraitsFunc::SuccessResponse("Disconnected Successfully !!!");
        return \Response::json((object) $data);        
    }
   
    /**
     * @OA\Post(
     *     path="/instances/clearInstance",
     *     tags={"Instances"},
     *     operationId="clearInstance",
     *     summary="clear instance data",
     *     description="clear instance data",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     
     *     @OA\Response(response="200", description="returns Disconnected.")
     * )
     */
    public function clearInstance(){
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if($deviceObj->status != 'connected'){
            return \TraitsFunc::ErrorMessage("Account Status isn't equal to connected !!");
        }

        $find = Http::delete(env('URL_WA_SERVER').'/sessions/clearInstance/'.$name);
        $deviceObj->status = '';
        $deviceObj->image = null;
        $deviceObj->save();

        Dialog::where('sessionId',$name)->delete();
        Message::where('sessionId',$name)->delete();
        
        $data['data'] = 'Disconnected';
        $data['status'] = \TraitsFunc::SuccessResponse("Disconnected Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/instances/updateChannelSetting",
     *     tags={"Instances"},
     *     operationId="updateChannelSetting",
     *     summary="update instance setting",
     *     description="update instance settings like webhook urls",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json"
     *         )
     *     ),
     *     @OA\Parameter(
     *         description="Messages Webhook",
     *         in="query",
     *         name="webhooks[messageNotifications]",
     *         required=false,
     *     ),
     *     @OA\Parameter(
     *         description="Messages status Ack Webhook",
     *         in="query",
     *         name="webhooks[ackNotifications]",
     *         required=false,
     *     ),
     *     @OA\Parameter(
     *         description="Dialogs Webhook",
     *         in="query",
     *         name="webhooks[chatNotifications]",
     *         required=false,
     *     ),
     *     @OA\Parameter(
     *         description="Labels Webhook",
     *         in="query",
     *         name="webhooks[labelNotifications]",
     *         required=false,
     *     ),
     *     @OA\Response(response="200", description="returns channel setting object after modifications.")
     * )
     */
    public function updateChannelSetting(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }
        
        $settingObj = DeviceSetting::where('sessionId',NAME)->first();
        if(!$settingObj){
            $settingObj = new DeviceSetting;
            $settingObj->created_at = date('Y-m-d H:i:s');
            $settingObj->sessionId = NAME;              
        }

        if(isset($input['webhooks']) && !empty($input['webhooks'])){
            $oldUrls = (array) json_decode($settingObj->webhooks);
            if(!empty($oldUrls)){
                if(isset($input['webhooks']['messageNotifications']) && !empty($input['webhooks']['messageNotifications'])){
                    $oldUrls['messageNotifications'] = $input['webhooks']['messageNotifications'];
                }
                if(isset($input['webhooks']['ackNotifications']) && !empty($input['webhooks']['ackNotifications'])){
                    $oldUrls['ackNotifications'] = $input['webhooks']['ackNotifications'];
                }
                if(isset($input['webhooks']['chatNotifications']) && !empty($input['webhooks']['chatNotifications'])){
                    $oldUrls['chatNotifications'] = $input['webhooks']['chatNotifications'];
                }
                if(isset($input['webhooks']['labelNotifications']) && !empty($input['webhooks']['labelNotifications'])){
                    $oldUrls['labelNotifications'] = $input['webhooks']['labelNotifications'];
                }
                $settingObj->webhooks = json_encode($oldUrls);
            }else{
                $settingObj->webhooks = json_encode($input['webhooks']);
            }
        }

        if(isset($input['sendDelay']) && !empty($input['sendDelay'])){
            $settingObj->sendDelay = $input['sendDelay'];
        }

        if(isset($input['statusNotificationsOn']) && !empty($input['statusNotificationsOn'])){
            $settingObj->statusNotificationsOn = $input['statusNotificationsOn'] == 'on' ? 1 : 0;
        }

        if(isset($input['filesUploadOn']) && !empty($input['filesUploadOn'])){
            $settingObj->filesUploadOn = $input['filesUploadOn'] == 'on' ? 1 : 0;
        }

        if(isset($input['ignoreOldMessages']) && !empty($input['ignoreOldMessages'])){
            $settingObj->ignoreOldMessages = $input['ignoreOldMessages'] == 'on' ? 1 : 0;
        }

        if(isset($input['disableGroupsArchive']) && !empty($input['disableGroupsArchive'])){
            $settingObj->disableGroupsArchive = $input['disableGroupsArchive'] == 'on' ? 1 : 0;
        }

        if(isset($input['disableDialogsArchive']) && !empty($input['disableDialogsArchive'])){
            $settingObj->disableDialogsArchive = $input['disableDialogsArchive'] == 'on' ? 1 : 0;
        }

        $settingObj->updated_at = date('Y-m-d H:i:s');
        $settingObj->save();
        $data['data'] = DeviceSetting::getData($settingObj);
        unset($data['data']->created_at);
        unset($data['data']->updated_at);
        $data['status'] = \TraitsFunc::SuccessResponse("Settings Updated Successfully !!!");
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Get(
     *     path="/profiles/me",
     *     tags={"Profiles"},
     *     operationId="me",
     *     summary="fetch user data",
     *     description="fetch connected user data",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description="returns me object.")
     * )
     */
    public function me(){
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }
      
        $settingObj = DeviceSetting::where('sessionId',NAME)->first();

        $response = Http::get(env('URL_WA_SERVER').'/instances/me?id='.$name);
        $res = json_decode($response->getBody());

        $data['data'] = [];
        if(isset($res->success) && $res->success){
            $data['data'] = (array)$res->data;
        }
        $data['data']['channelSetting'] = $settingObj != null ? DeviceSetting::getData($settingObj) : [];
        unset($data['data']['channelSetting']->created_at);
        unset($data['data']['channelSetting']->updated_at);
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }
    
    /**
     * @OA\Post(
     *     path="/profiles/updateProfilePicture",
     *     tags={"Profiles"},
     *     operationId="updateProfilePicture",
     *     summary="Update Profile Picture",
     *     description="update my profile picture or my groups",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Parameter(description="Phone or group id",in="query",name="phone", required=true),
     *     @OA\Parameter(description="Image Url",in="query",name="imageURL", required=true),
     *     @OA\Response(response="200", description="returns updateProfilePicture object.")
     * )
     */
    public function updateProfilePicture(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }
        
        if(!isset($input['imageURL']) || empty($input['imageURL'])){
            return \TraitsFunc::ErrorMessage("Image Url is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/instances/updateProfilePicture?id='.$name, $input);
        $res = json_decode($response->getBody());

        
        $data['data'] = [];
        if(isset($res->success) && $res->success){
            $data['data'] = (array)$res->data;
            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }else{
            return \TraitsFunc::ErrorMessage($res->message);
        }
    }

    /**
     * @OA\Post(
     *     path="/profiles/updatePresence",
     *     tags={"Profiles"},
     *     operationId="updatePresence",
     *     summary="Update Presence for 10 seconds",
     *     description="update target presence",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Parameter(description="Phone or group id",in="query",name="phone", required=true),
     *     @OA\Parameter(description="User Presence",in="query",name="presence", required=true),
     *     @OA\Response(response="200", description="returns updatePresence object.")
     * )
     */
    public function updatePresence(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }
        
        if(!isset($input['presence']) || empty($input['presence'])){
            return \TraitsFunc::ErrorMessage("Presence field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/instances/updatePresence?id='.$name, $input);
        $res = json_decode($response->getBody());

        
        $data['data'] = [];
        if(isset($res->success) && $res->success){
            $data['data'] = (array)$res->data;
            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }else{
            return \TraitsFunc::ErrorMessage($res->message);
        }
    }

    /**
     * @OA\Post(
     *     path="/profiles/updateName",
     *     tags={"Profiles"},
     *     operationId="updateName",
     *     summary="Update Profile Name",
     *     description="update profile name",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Parameter(description="Name",in="query",name="name", required=true),
     *     @OA\Response(response="200", description="returns updateName object.")
     * )
     */
    public function updateName(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['name']) || empty($input['name'])){
            return \TraitsFunc::ErrorMessage("Name field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/instances/updateProfileName?id='.$name, $input);
        $res = json_decode($response->getBody());

        
        $data['data'] = [];
        if(isset($res->success) && $res->success){
            $data['data'] = (array)$res->data;
            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }else{
            return \TraitsFunc::ErrorMessage($res->message);
        }
    }

    /**
     * @OA\Post(
     *     path="/profiles/updateStatus",
     *     tags={"Profiles"},
     *     operationId="updateStatus",
     *     summary="Update Profile Status",
     *     description="update profile status",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Parameter(description="Status",in="query",name="status", required=true),
     *     @OA\Response(response="200", description="returns updateStatus object.")
     * )
     */
    public function updateStatus(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['status']) || empty($input['status'])){
            return \TraitsFunc::ErrorMessage("Status field is required !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/instances/updateProfileStatus?id='.$name, $input);
        $res = json_decode($response->getBody());

        
        $data['data'] = [];
        if(isset($res->success) && $res->success){
            $data['data'] = (array)$res->data;
            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }else{
            return \TraitsFunc::ErrorMessage($res->message);
        }
    }


    /**
     * @OA\Get(
     *     path="/queues/getMessagesQueue",
     *     tags={"Queues"},
     *     operationId="getMessagesQueue",
     *     summary="fetch user messages queue",
     *     description="fetch user messages queue",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description="")
     * )
     */
    
    public function getMessagesQueue(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        $messages = OfflineMessage::where('sessionId',$name)->where('is_sent',0)->get();

        foreach($messages as $key => $message){
            $details = json_decode($message->message);
            unset($messages[$key]->message);
            $messages[$key]->messageId =  'true_'.str_replace('@s.whatsapp.net','@c.us', $details->key->remoteJid).'_'. $details->key->id;
        }

        $data['data']['messages'] = $messages;
        $data['data']['count'] = count($messages);
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/queues/clearMessagesQueue",
     *     tags={"Queues"},
     *     operationId="clearMessagesQueue",
     *     summary="clear user messages queue",
     *     description="clear user messages queue",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description="")
     * )
     */
    
    public function clearMessagesQueue(){
        $name = NAME;
        $input = Request::all();
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        $messages = OfflineMessage::where('sessionId',$name)->where('is_sent',0);
        $count = $messages->count();
        $messages->delete();
        $data['data']['count'] = $count;
        $data['status'] = \TraitsFunc::SuccessResponse('Messages Queue is empty now');
        return \Response::json((object) $data);        
    }
}
