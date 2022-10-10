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
     * @group Channels
     *
     * API for listing all user channels
    */
    public function channels(){
        $dataList['data'] = Device::dataList(USER_ID)['data'];
        $dataList['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $dataList);        
    }
    
    /**
     * @group Channels
     *
     * API for creating new channel
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

        $cekMD = Device::NotDeleted()->where('name',$deviceObj->name)->first();
        if($cekMD->multidevice == "YES"){
            $islegacy = "false"; 
        }else{
            $islegacy = "true"; 
        }

        $response = Http::post(env('URL_WA_SERVER').'/sessions/add', ['id' => $deviceObj->name, 'isLegacy' => $islegacy]);
        $res = json_decode($response->getBody());
        $image = "";
        if(isset($res->success) && $res->success == true){
            $image = $res->data->qr;
        }

        $instance = Channel::generateNewKey($deviceObj->name);
        $instance->qrImage = $image;

        Device::NotDeleted()->where('name',$deviceObj->name)->update([
            'channel_id' => isset($input['wlChannelName']) && !empty($input['wlChannelName']) ? $input['wlChannelName'] : $deviceObj->id,
            'channel_token' => $instance->token,
            'image' => $image,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $instance->id =  isset($input['wlChannelName']) && !empty($input['wlChannelName']) ? $input['wlChannelName'] : $deviceObj->id;

        $dataList['data']['instance'] = $instance; 
        $dataList['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $dataList);        
    }

    /**
     * @group Channels
     *
     * API for deleteing specific channel by id
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
     * @group Channels
     *
     * API for transfering days from a channel to another
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

        $dataList['data'] = "deleted";
        $dataList['status'] = \TraitsFunc::SuccessResponse("Transfered ".$input['days']." day to :".$input['receiver']." Successfully !!!");
        return \Response::json((object) $dataList);        
    }

    
}
