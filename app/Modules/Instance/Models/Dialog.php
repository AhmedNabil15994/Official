<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model{
    use \TraitsFunc;

    protected $table = 'dialogs';
    protected $connection = 'mysql';
    protected $fillable = ['id','sessionId','name','last_time','image','pinned','archived','unreadCount','readOnly','ephemeralExpiration','deleted_by','notSpam','unreadMentionCount','deleted_at'];    
    public $timestamps = false;
    protected $casts = ['id' => 'string'];


    static function dataList($sessionId=null) {
        $input = \Request::all();
        $source = self::NotDeleted();
        $source->orderBy('last_time','DESC');

        if(isset($input['chatId']) && !empty($input['chatId'])){
            $source->where('id',$input['chatId'].'@s.whatsapp.net')->orWhere('id',$input['chatId'].'@c.us');
        }
        if($sessionId != null){
            $source->where('sessionId',$sessionId);
        }

        if(isset($input['orderBy']) && !empty($input['orderBy']) && isset($input['sort']) && !empty($input['sort'])){
            $source->orderBy($input['orderBy'],$input['sort']);
        }else{
            $source->orderBy('last_time','DESC');
        }
        $limit = 100;
        if(isset($input['lmts']) && !empty($input['lmts'])){
            $limit = $input['lmts'];
        }
        return self::generateObj($source,$limit);
    }

    static function generateObj($source,$limit){
        if($limit == 'all'){
            $sourceArr = $source->get();
        }else{
            $sourceArr = $source->paginate($limit);
        }
        $list = [];
        
        foreach($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        $data['data'] = $list;
        if($limit != 'all'){
            $data['pagination'] = \Helper::GeneratePagination($sourceArr);
        }

        return $data;
    }


    static function getData($source){
        $dataObj = new \stdClass();
        $dataObj->id = str_replace('s.whatsapp.net','c.us',$source->id);
        $dataObj->name = isset($source->name) ? $source->name : '';
        // $dataObj->sessionId = $source->sessionId;
        $dataObj->last_time = isset($source->last_time) ? $source->last_time : (isset($source->conversationTimestamp) ? $source->conversationTimestamp : 0);
        $dataObj->image = isset($source->image) ? $source->image : '';
        $dataObj->pinned = isset($source->pinned) ? $source->pinned : (isset($source->pin) ? $source->pin : 0);
        $dataObj->archived = isset($source->archived) ? ($source->archived == true ? 1 : 0) : (isset($source->archive) ? $source->archive : 0);
        $dataObj->unreadCount = isset($source->unreadCount) ? $source->unreadCount : 0;
        $dataObj->readOnly = isset($source->readOnly) ? $source->readOnly : 0;
        $dataObj->ephemeralExpiration = isset($source->ephemeralExpiration) ? $source->ephemeralExpiration : 0;
        $dataObj->notSpam =  isset($source->notSpam) ? $source->notSpam : 0;
        $dataObj->unreadMentionCount = isset($source->unreadMentionCount) ? $source->unreadMentionCount : 0;


        $dataObj->is_pinned = isset($source->pinned) ? ($source->pinned > 1 ? 1 : 0) : 0;
        $dataObj->is_read = isset($source->unreadCount) && $source->unreadCount > 0 ? 0 : 1;
        $dataObj->metadata = [];
        // $dataObj->deleted_at = $source->deleted_at;
        // $dataObj->deleted_by = $source->deleted_by;
        return $dataObj;
    }  


}
