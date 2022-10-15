<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;
use App\Models\OfflineMessage;

class DashboardControllers extends Controller {

    use \TraitsFunc;

    public function index(){   
        $input = \Request::all();
        $data['channels'] = Device::where('id_users',USER_ID)->count();
        $data['activeChannels'] = Device::NotDeleted()->where('id_users',USER_ID)->where('valid_until','>',date('Y-m-d H:i:s'))->count();
        $data['unActiveChannels'] =  Device::NotDeleted()->where('id_users',USER_ID)->where('valid_until','<=',date('Y-m-d H:i:s'))->count();
        $data['deletedChannels'] = $data['channels'] - $data['activeChannels'] - $data['unActiveChannels'];

        $data['queues'] = OfflineMessage::whereHas('Device',function($whereQuery){
            $whereQuery->where('id_users',USER_ID);
        })->count();
        $data['sentQueues'] = OfflineMessage::whereHas('Device',function($whereQuery){
            $whereQuery->where('id_users',USER_ID);
        })->where('is_sent',1)->count();
        $data['notSentQueues'] =  OfflineMessage::whereHas('Device',function($whereQuery){
            $whereQuery->where('id_users',USER_ID);
        })->where('is_sent',0)->count();

        $activeDays = Device::NotDeleted()->where('id_users',USER_ID)->where('valid_until','>',date('Y-m-d H:i:s'))->select('*',\DB::raw('count(days) as total') , \DB::raw('DATEDIFF(valid_until,"'.date('Y-m-d H:i:s').'") as actualDays'))->orderBy('actualDays','DESC')->groupBy('id');
        
        $days = 0;
        $storage = 0;
        foreach($activeDays->get() as $one){
            $days+=$one->actualDays;
        }
        $data['days'] =  $days;

        $storages = [];
        foreach(Device::where('id_users',USER_ID)->get() as $dev){
            $path = base_path().'/../Wloop/Baileys/Media/messages/'.$dev->id;
            $file_size = 0;
            if(file_exists($path)){
                foreach( \File::allFiles($path) as $file){
                    $file_size += $file->getSize();
                }
            }
            $storages[] = [
                'size' => round($file_size / (1024 * 1024) , 2),
                'id' => $dev->id,
            ];
            $storage+= round($file_size / (1024 * 1024) , 2);
        }
        usort($storages, function($a, $b) { return $b['size'] - $a['size']; });
  
        $data['storage'] = round($storage ,2);
        $data['storageText'] = ' MB';

        $data['channelMostQueues'] = OfflineMessage::whereHas('Device',function($whereQuery){
            $whereQuery->where('id_users',USER_ID);
        })->select(\DB::raw('count(*) as total') , 'sessionId')->orderBy('total','DESC')->groupBy('sessionId')->get()->take(5);
        $data['channelMostDays'] = $activeDays->get()->take(5);
        $data['channelMostStorage'] = array_slice($storages,0,5);
        return view('Dashboard.Dashboard.Views.dashboard')->with('data',(object) $data);
    }

    public function changeLang(Request $request){
        if($request->ajax()){
            if(!Session::has('locale')){
                Session::put('locale', $request->locale);
            }else{
                Session::forget('locale');
                Session::put('locale', $request->locale);
            }
        }
    }
}
