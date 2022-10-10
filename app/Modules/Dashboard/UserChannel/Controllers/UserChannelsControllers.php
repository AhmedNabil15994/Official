<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;
use App\Models\DeviceSetting;
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

        $data = Device::getData($channelObj);
        $data->details = $channelObj->ChannelSetting != null ? DeviceSetting::getData($channelObj->ChannelSetting) : [];
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

        $find = Http::delete(env('URL_WA_SERVER').'/sessions/delete/'.$channelObj->name);
        $channelObj->status = 'disconnected';
        $channelObj->image = null;
        $channelObj->save();
        
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

        $find = Http::delete(env('URL_WA_SERVER').'/sessions/clearInstance/'.$channelObj->name);
        $channelObj->status = '';
        $channelObj->image = null;
        $channelObj->save();
        
        Session::flash('success', trans('main.clearSuccess'));
        return redirect()->back();
    }
}
