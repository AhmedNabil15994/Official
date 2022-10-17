<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflineMessage extends Model
{
    use \TraitsFunc;
    protected $connection = 'mysql';
    protected $table = 'offline_messages';
    // protected $fillable = [];    
    public $timestamps = false;
    
    public function Device(){
        return $this->belongsTo('App\Models\Device','sessionId','name');
    }

    static function dataList($sessionId=null) {
        $input = \Request::all();
        $source = self::all();

        if($sessionId != null){
            $source = self::where('sessionId',$sessionId)->orderBy('id','DESC');
        }else{
            $source = self::orderBy('id','DESC');
        }

        return self::generateObj($source);
    }

    static function generateObj($source,$setID=false){
        $sourceArr = $source->get();
        $list = [];
        
        foreach($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value,$setID);
        }

        $data['data'] = $list;
        return (object)$data;
    }


    static function getData($source,$setID=false){
        $dataObj = new \stdClass();
        if($setID){
            if($source->message != null){
                $msgObj = json_decode($source->message);
                $dataObj->id =  ($msgObj->key->fromMe ? 'true_':'false_').str_replace('@s.whatsapp.net','@c.us', $msgObj->key->remoteJid).'_'. $msgObj->key->id;
            }
        }else{
            $dataObj->id =  $source->message != null ? json_decode($source->message)->key->id : '';
        }
        $dataObj->type = $source->type;
        $dataObj->chatId = str_replace('@s.whatsapp.net','',$source->chatId);
        $dataObj->is_sent = $source->is_sent == 1 ? trans('main.yes') : trans('main.no');
        $dataObj->status = $source->status;
        $dataObj->queued_at = date('Y-m-d H:i:s',$source->sent_time);
        $dataObj->sent_at = $source->updated_at != null ? $source->updated_at : '';
        return $dataObj;
    }  
}
