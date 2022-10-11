<?php namespace App\Http\Controllers;

use Request;
use Response;
use URL;
use DB;
use App\Models\Device;
use App\Models\Channel;
use Illuminate\Support\Facades\Http;

class ChannelsControllers extends Controller {

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
     *     path="/channels",
     *     tags={"Channels"},
     *     operationId="channels",
     *     summary="fetch user channels",
     *     description="fetch user all channels",
     *     security={ {"bearer_token": {}}},
     *     @OA\Response(response="200", description="")
     * )
     */
    public function channels(){
        $dataList['data'] = Device::dataList(USER_ID)['data'];
        $dataList['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $dataList);        
    }
    
    /**
     * @OA\Post(
     *     path="/channels/createChannel",
     *     tags={"Channels"},
     *     operationId="createChannel",
     *     summary="create new user channel",
     *     description="create new user channel",
     *     security={ {"bearer_token": {}}},
     *     @OA\Response(response="200", description="")
     * )
     */
    public function createChannel(){
        $input = \Request::all();

        $deviceObj = new Device;
        $deviceObj->id_users = USER_ID;
        $deviceObj->multidevice = 'YES';
        $deviceObj->days = 0;
        $deviceObj->valid_until = DATE_TIME;
        $deviceObj->created_at = DATE_TIME;
        $deviceObj->save();

        $deviceObj->name = isset($input['wlChannelName']) && !empty($input['wlChannelName']) ? 'wlChannel'.$input['wlChannelName'] : 'wlChannel'.$deviceObj->id;
        $deviceObj->save();

        $response = Http::post(env('URL_WA_SERVER').'/sessions/add', ['id' => $deviceObj->name, 'isLegacy' => 'false']);
        $res = json_decode($response->getBody());
        $image = "";

        $instance = Channel::generateNewKey($deviceObj->name);

        Device::NotDeleted()->where('name',$deviceObj->name)->update([
            'channel_id' => isset($input['wlChannelName']) && !empty($input['wlChannelName']) ? $input['wlChannelName'] : $deviceObj->id,
            'channel_token' => $instance->token,
            'image' => $image,
            'valid_until' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $instance->id =  isset($input['wlChannelName']) && !empty($input['wlChannelName']) ? $input['wlChannelName'] : $deviceObj->id;
        $instance->days = 0;
        $instance->paidUntil = date('Y-m-d H:i:s');
        $dataList['data']['instance'] = $instance; 
        $dataList['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $dataList);        
    }

    /**
     * @OA\Post(
     *     path="/channels/deleteChannel",
     *     tags={"Channels"},
     *     operationId="deleteChannel",
     *     summary="delete new user channel",
     *     description="delete new user channel",
     *     security={ {"bearer_token": {}}},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Channel ID",in="query",name="channel_id", required=true),
     * )
     */
    public function deleteChannel(){
        $input = \Request::all();
        if(!isset($input['channel_id']) || empty($input['channel_id'])){
            return \TraitsFunc::ErrorMessage("Please enter valid Channel ID");
        }

        $checkObj = Device::NotDeleted()->where('channel_id',$input['channel_id'])->first();
        if(!$checkObj){
            return \TraitsFunc::ErrorMessage("Channel isn't found or belonged to another user");
        }

        $checkObj->update([
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $checkObj->id_users,
        ]);

        $dataList['data'] = "deleted";
        $dataList['status'] = \TraitsFunc::SuccessResponse("Channel Deleted Successfully !!!");
        return \Response::json((object) $dataList);        
    }

    /**
     * @OA\Post(
     *     path="/channels/transferDays",
     *     tags={"Channels"},
     *     operationId="transferDays",
     *     summary="transfer days",
     *     description="transfer days from a channel to another",
     *     security={ {"bearer_token": {}}},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Sender Channel ID",in="query",name="sender", required=true),
     *     @OA\Parameter(description="Receiver Channel ID",in="query",name="receiver", required=true),
     *     @OA\Parameter(description="Number of days",in="query",name="days", required=true),
     * )
     */
    public function transferDays(){
        $input = \Request::all();

        if(!isset($input['sender']) || empty($input['sender'])){
            return \TraitsFunc::ErrorMessage("Please enter valid Sender Channel ID");
        }

        if(!isset($input['receiver']) || empty($input['receiver'])){
            return \TraitsFunc::ErrorMessage("Please enter valid Receiver Channel ID");
        }

        if(!isset($input['days']) || empty($input['days'])){
            return \TraitsFunc::ErrorMessage("Please enter valid Days number");
        }

        $senderCheckObj = Device::NotDeleted()->where('id_users',USER_ID)->where('channel_id',$input['sender'])->first();
        if(!$senderCheckObj){
            return \TraitsFunc::ErrorMessage("Channel isn't found or belonged to another user");
        }

        if($senderCheckObj->days <= 1){
            return \TraitsFunc::ErrorMessage("Sender Channel must have 2 days at least");
        }

        if($senderCheckObj->days < ($input['days'] + 1)){
            return \TraitsFunc::ErrorMessage("Sender Channel must have 1 day at least as a difference between transfering days");
        }

        $receiverCheckObj = Device::NotDeleted()->where('id_users',USER_ID)->where('channel_id',$input['receiver'])->first();
        if(!$receiverCheckObj){
            return \TraitsFunc::ErrorMessage("Channel isn't found or belonged to another user");
        }
        
        $senderCheckObj->days = $senderCheckObj->days - $input['days'];
        $senderCheckObj->valid_until = date('Y-m-d H:i:s',strtotime('-'.$input['days'].' days',strtotime( $senderCheckObj->valid_until != null ? $senderCheckObj->valid_until : date('Y-m-d H:i:s') )));
        $senderCheckObj->save();

        $receiverCheckObj->days = $receiverCheckObj->days + $input['days'];
        $receiverCheckObj->valid_until = date('Y-m-d H:i:s',strtotime('+'.$input['days'].' days',strtotime( $receiverCheckObj->valid_until != null ? $receiverCheckObj->valid_until : date('Y-m-d H:i:s') )));
        $receiverCheckObj->save();

        $dataList['data'] = "transferred";
        $dataList['status'] = \TraitsFunc::SuccessResponse("Transfered ".$input['days']." day to :".$input['receiver']." Successfully !!!");
        return \Response::json((object) $dataList);        
    }

    
}
