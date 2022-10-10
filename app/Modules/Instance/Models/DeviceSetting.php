<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceSetting extends Model{
    use \TraitsFunc;

    protected $table = 'device_setting';
    protected $connection = 'mysql';
    protected $fillable = ['id','sessionId','userId','sendDelay','webhooks','statusNotificationsOn','filesUploadOn','ignoreOldMessages','disableGroupsArchive','disableDialogsArchive','created_at','updated_at'];    
    public $timestamps = false;


    static function dataList($sessionId=null) {
        $input = \Request::all();
        $source = self::orderBy('id','desc');

        if($sessionId != null){
            $source->where('sessionId',$sessionId);
        }
        return self::generateObj($source,$limit,$disDetails);
    }

    static function generateObj($source){
        $sourceArr = $source->get();
        $list = [];
        
        foreach($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        return $list;
    }


    static function getData($source){
        $dataObj = new \stdClass();
        $dataObj->sendDelay = $source->sendDelay;
        $dataObj->webhooks = $source->webhooks != '' ? json_decode($source->webhooks) : [];
        $dataObj->statusNotificationsOn = $source->statusNotificationsOn;
        $dataObj->filesUploadOn = $source->filesUploadOn;
        $dataObj->ignoreOldMessages = $source->ignoreOldMessages;
        $dataObj->disableGroupsArchive = $source->disableGroupsArchive;
        $dataObj->disableDialogsArchive = $source->disableDialogsArchive;
        $dataObj->created_at = $source->created_at;
        $dataObj->updated_at = $source->updated_at;
        return $dataObj;
    }  


}
