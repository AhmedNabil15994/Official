<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;
use App\Models\OfflineMessage;
use App\Models\DeviceSetting;
use App\Jobs\OfflineMessageJob;
use Http;

class UserChannelsControllers extends Controller {

    use \TraitsFunc;

    public function index(){   
        $input = \Request::all();
        $data = Device::dataList(USER_ID);
        return view('Dashboard.UserChannel.Views.index')->with('data',(object) $data);
    }

    public function view($id){
        $id = (int) $id;

        $channelObj = Device::getOneByChannelId($id);
        if ($channelObj == null) {
            Session::flash('error', trans('main.invalidChannel'));
            return redirect()->back();
        }

        if ($channelObj->id_users != USER_ID) {
            Session::flash('error', trans('main.invalidChannelOwner'));
            return redirect()->back();
        }

        $newChannelObj = Device::getData($channelObj);
        $data = new \stdClass();//OfflineMessage::dataList($newChannelObj->name);
        $data->device = $newChannelObj;
        $data->details = $channelObj->ChannelSetting != null ? DeviceSetting::getData($channelObj->ChannelSetting) : [];
        $data->channels = Device::dataList(USER_ID)['data'];
        return view('Dashboard.UserChannel.Views.view')->with('data',$data);
    }

    public function logout($id){
        $id = (int) $id;

        $channelObj = Device::getOneByChannelId($id);
        if ($channelObj == null) {
            Session::flash('error', trans('main.invalidChannel'));
            return redirect()->back();
        }

        if ($channelObj->id_users != USER_ID) {
            Session::flash('error', trans('main.invalidChannelOwner'));
            return redirect()->back();
        }

        if($channelObj->status != 'connected'){
            Session::flash('error', trans('main.accoutMustBeConnected'));
            return redirect()->back();
        }

        try {
            $find = Http::delete(env('URL_WA_SERVER').'/sessions/delete/'.$channelObj->name);
            $channelObj->status = 'disconnected';
            $channelObj->image = null;
            $channelObj->save();
        } catch (\Illuminate\Http\Client\ConnectionException $e) {}
        
        Session::flash('success', trans('main.logoutSuccess'));
        return redirect()->back();
    }

    public function clear($id){
        $id = (int) $id;

        $channelObj = Device::getOneByChannelId($id);
        if ($channelObj == null) {
            Session::flash('error', trans('main.invalidChannel'));
            return redirect()->back();
        }

        if ($channelObj->id_users != USER_ID) {
            Session::flash('error', trans('main.invalidChannelOwner'));
            return redirect()->back();
        }

        if($channelObj->status != 'connected'){
            Session::flash('error', trans('main.accoutMustBeConnected'));
            return redirect()->back();
        }

        try {
            $find = Http::delete(env('URL_WA_SERVER').'/sessions/clearInstance/'.$channelObj->name);
            $channelObj->status = '';
            $channelObj->image = null;
            $channelObj->save();
        } catch (\Illuminate\Http\Client\ConnectionException $e) {}
        
        Session::flash('success', trans('main.clearSuccess'));
        return redirect()->back();
    }

    public function transferDays($id){
        $id = (int) $id;
        $input = \Request::all();

        $channelObj = Device::getOneByChannelId($id);
        if ($channelObj == null) {
            Session::flash('error', trans('main.invalidChannel'));
            return redirect()->back();
        }

        if ($channelObj->id_users != USER_ID) {
            Session::flash('error', trans('main.invalidChannelOwner'));
            return redirect()->back();
        }

        if(!isset($input['receiver']) || empty($input['receiver'])){
            return \TraitsFunc::ErrorMessage("Please enter valid Receiver Channel ID");
        }

        if(!isset($input['days']) || empty($input['days'])){
            return \TraitsFunc::ErrorMessage("Please enter valid Days number");
        }

        $senderCheckObj = Device::NotDeleted()->where('id_users',USER_ID)->where('channel_id',$id)->first();
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
        $receiverCheckObj->valid_until = date('Y-m-d H:i:s',strtotime('+'.$input['days'].' days',strtotime( $receiverCheckObj->valid_until != null && $receiverCheckObj->valid_until >= date('Y-m-d H:i:s') ? $receiverCheckObj->valid_until : date('Y-m-d H:i:s') )));
        $receiverCheckObj->save();

        $dataList['data'] = "transferred";
        $dataList['status'] = \TraitsFunc::SuccessResponse("Transfered ".$input['days']." day to :".$input['receiver']." Successfully !!!");
        return \Response::json((object) $dataList);        
    }

    public function updateSetting($id){
        $id = (int) $id;
        $input = \Request::all();

        $channelObj = Device::getOneByChannelId($id);
        if ($channelObj == null) {
            Session::flash('error', trans('main.invalidChannel'));
            return redirect()->back();
        }

        if ($channelObj->id_users != USER_ID) {
            Session::flash('error', trans('main.invalidChannelOwner'));
            return redirect()->back();
        }
        
        $settingObj = DeviceSetting::where('sessionId',$channelObj->name)->first();

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
        Session::flash('success', trans('main.editSuccess'));
        return redirect()->back();
    }

    public function resend($id){
        $id = (int) $id;

        $channelObj = Device::getOneByChannelId($id);
        if ($channelObj == null) {
            Session::flash('error', trans('main.invalidChannel'));
            return redirect()->back();
        }

        if ($channelObj->id_users != USER_ID) {
            Session::flash('error', trans('main.invalidChannelOwner'));
            return redirect()->back();
        }

        if($channelObj->status != 'connected'){
            Session::flash('error', trans('main.accoutMustBeConnected'));
            return redirect()->back();
        }

        $chunks = 50;
        $queuedMessages = OfflineMessage::where('sessionId',$channelObj->name)->where('is_sent',0)->chunk($chunks,function($data){
            try {
                dispatch(new OfflineMessageJob(reset($data)))->onConnection('database');
            } catch (Exception $e) {}
        });
        
        Session::flash('success', trans('main.inPrgo'));
        return redirect()->back();
    }

    public function getHistory($id){
        $id = (int) $id;
        $input = \Request::all();

        $channelObj = Device::getOneByChannelId($id);
        if ($channelObj == null) {
            Session::flash('error', trans('main.invalidChannel'));
            return redirect()->back();
        }

        if ($channelObj->id_users != USER_ID) {
            Session::flash('error', trans('main.invalidChannelOwner'));
            return redirect()->back();
        }

        $queryString = '';
        if(isset($input['page']) && !empty($input['page'])){
            $queryString.= '&page='.$input['page'];
        }
        if(isset($input['start']) && !empty($input['start'])){
            $queryString.= '&page='. ($input['start'] == 0 ? 1 : ($input['start'] / $input['length'])+1 );
        }
        if(isset($input['length']) && !empty($input['length'])){
            $queryString.= '&page_size='.$input['length'];
        }

        $history = [];
        $count = 0;
        try {
            $find = Http::get(env('URL_WA_SERVER').'/messages?id='.$channelObj->name.$queryString);
            $result = $find->json();
            if($result && isset($result['data']) && isset($result['data']['data'])){
                if(is_array($result['data']['data'])){
                    foreach($result['data']['data'] as $oneMessage){
                        if(isset($oneMessage['id'])){
                            $newObj = \Helper::formatMessages(\Helper::formatArrayShape((array)$oneMessage),$channelObj->name,true);
                            if(!empty($newObj)){
                                $history[] = $newObj;
                            }
                        }
                    }
                }
                $history = $history;
                $count = $result['data']['pagination']['totalCount'];
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {}

        $dataList['draw'] = isset($input['draw']) && !empty($input['draw']) ? $input['draw'] : 1;
        $dataList['recordsTotal'] = $count;
        $dataList['recordsFiltered'] = $count;
        $dataList['data'] = $history;
        // $dataList['status'] = \TraitsFunc::SuccessResponse("Data Generated Successfully !!!");
        return $dataList;        
    }

    public function getQueue($id){
        $id = (int) $id;
        $input = \Request::all();

        $channelObj = Device::getOneByChannelId($id);
        if ($channelObj == null) {
            Session::flash('error', trans('main.invalidChannel'));
            return redirect()->back();
        }

        if ($channelObj->id_users != USER_ID) {
            Session::flash('error', trans('main.invalidChannelOwner'));
            return redirect()->back();
        }

        $draw = $input['draw'];
        $start = $input['start'];
        $rowperpage = $input['length']; // Rows display per page
        $columnIndex_arr = $input['order'];
        $columnName_arr = $input['columns'];
        $order_arr = $input['order'];
        $search_arr = $input['search'];

        $columnIndex = @$columnIndex_arr[0]['column']; // Column index
        $columnName = @$columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = @$order_arr[0]['dir']; // asc or desc
        $searchValue = @$search_arr['value']; // Search value

        // Fetch records
        $count = OfflineMessage::where('sessionId',$channelObj->name)->count();
        $records = OfflineMessage::where('sessionId',$channelObj->name)->orderBy('id','DESC')
           ->skip($start)
           ->take($rowperpage);
        $data = OfflineMessage::generateObj($records,true);
        

        $dataList['draw'] = isset($input['draw']) && !empty($input['draw']) ? $input['draw'] : 1;
        $dataList['recordsTotal'] = $count;
        $dataList['recordsFiltered'] = $count;
        $dataList['data'] = $data->data;
        return $dataList;        
    }
}
