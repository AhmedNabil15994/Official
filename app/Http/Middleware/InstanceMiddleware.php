<?php namespace App\Http\Middleware;

use Closure;
use App\Models\Device;

class InstanceMiddleware
{

    public function handle($request, Closure $next){
        if (!isset($_SERVER['HTTP_SESSIONID'])) {
            if (!isset($_SERVER['HTTP_CHANNELID'])) {
                return \TraitsFunc::ErrorMessage("Channel ID is invalid", 401);
            }

            if (!isset($_SERVER['HTTP_CHANNELTOKEN'])) {
                return \TraitsFunc::ErrorMessage("Channel Token is invalid", 401);
            }

            $channelId = $_SERVER['HTTP_CHANNELID'];
            $channelToken = $_SERVER['HTTP_CHANNELTOKEN'];

            $checkChannel = Device::getUserDevice($channelId,$channelToken);
        }else{
            $channelName = $_SERVER['HTTP_SESSIONID'];
            $checkChannel = Device::NotDeleted()->where('name',$channelName)->first();
        }

        if ($checkChannel == null || $checkChannel->id_users != USER_ID) {
            return \TraitsFunc::ErrorMessage("Invalid Channel, Please Check Your Credentials", 401);
        }

        define('CHANNEL_ID', $checkChannel->channel_id);
        define('CHANNEL_TOKEN', $checkChannel->channel_token);
        define('NAME', $checkChannel->name);

        return $next($request);
    }
}
