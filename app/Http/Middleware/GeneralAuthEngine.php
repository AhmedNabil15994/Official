<?php namespace App\Http\Middleware;

use App\Models\User;
use App\Models\Device;
use Closure;
use Illuminate\Support\Facades\Session;

class GeneralAuthEngine
{

    public function handle($request, Closure $next){
        @define('DATE_TIME',date('Y-m-d H:i:s'));

        if(($request->segment(2) == 'uploads' || $request->segment(3) == 'uploads') || ($request->segment(2) == 'webhooks' || $request->segment(3) == 'webhooks') || $request->segment(2) == 'register' ){
            return $next($request);
        }

        $userObj = null;
        if($request->segment(2) == 'instances' && $request->segment(3) == 'status'){
            if (isset($_SERVER['HTTP_SESSIONID'])){
                $deviceObj = Device::where('name',@$_SERVER['HTTP_SESSIONID'])->first();
                if($deviceObj){
                    $userObj = User::find($deviceObj->id_users);
                }
            }
        }

        if(!$userObj){
            if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
                return \TraitsFunc::ErrorMessage("Authorization Key is required", 401);
            }

            $identifier = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
            $userObj = User::where('identifier',$identifier)->first();
        }


        if (!$userObj) {
            return \TraitsFunc::ErrorMessage("Authorization Key is invalid", 401);
        }

        define('USER_ID',$userObj->id);
        define('IDENTIFIER',$userObj->identifier);
        
        return $next($request);
    }
}
