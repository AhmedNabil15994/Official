<?php namespace App\Models;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;

class  Device extends Model{

    use \TraitsFunc;

    protected $table = 'device';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_users',
        'number',
        'name',
        'description',
        'channel_id',
        'channel_token',
        'multidevice',
        'created_at',
        'updated_at',
        'days',
        'valid_until',
        'status',
        'deleted_at',
        'deleted_by',
    ];

    public function ChannelSetting(){
        return $this->hasOne('App\Models\DeviceSetting','sessionId','name');
    }

    static function getOne($id) {
        return self::find($id);
    }

    static function getOneByChannelId($id) {
        return self::with('ChannelSetting')->where('channel_id',$id)->first();
    }

    static function getUserDevice($id,$token) {
        return self::NotDeleted()->where([
            ['channel_id',$id],
            ['channel_token',$token],
        ])->first();
    }

    static function dataList($id_users=null,$withPaginate=null) {
        $input = \Request::all();

        $source = self::NotDeleted()->where(function ($query) use ($input) {
            if (isset($input['channel_id']) && !empty($input['channel_id'])) {
                $query->where('channel_id',$input['channel_id']);
            }
            if (isset($input['token']) && !empty($input['token'])) {
                $query->where('token',$input['token']);
            } 
            if (isset($input['name']) && !empty($input['name'])) {
                $query->where('name', 'LIKE', '%' . $input['name'] . '%');
            } 
        });

        if($id_users != null){
            $source->where('id_users',$id_users);
        }
        $source->orderBy('id','DESC');
        return self::getObj($source,$withPaginate);
    }

    static function getObj($source,$withPaginate) {
        if($withPaginate == null){
            $sourceArr = $source->paginate(config('app.pagination_no'));
        }else{
            $sourceArr = $source->get();
        }

        $list = [];
        foreach ($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        $data['data'] = $list;
        if($withPaginate == null){
            $data['pagination'] = \Helper::GeneratePagination($sourceArr);
        }
        return $data;
    }

    static function getData($source){
        $dataObj = new \stdClass();
        $source = self::getDaysData($source);
        // $dataObj->id = $source->id;
        // $dataObj->id_users = $source->id_users;
        $dataObj->id = $source->channel_id;
        $dataObj->token = $source->channel_token;
        $dataObj->number = $source->number;
        $dataObj->name = $source->name;
        $dataObj->description = $source->description;
        $dataObj->multidevice = $source->multidevice;
        $dataObj->status = $source->status == null ? 'got QR and ready to scan' : $source->status;
        $dataObj->days = $source->days;
        $dataObj->valid_until = $source->valid_until;
        $dataObj->created_at = $source->created_at;
        $dataObj->validStatus = $source->valid_until > date('Y-m-d H:i:s') ? trans('main.active') : trans('main.notActive');
        // $dataObj->updated_at = $source->updated_at;
        // $dataObj->deleted_at = $source->deleted_at;
        return $dataObj;
    }

    static function getDaysData($source){
        $days = 0;
        if($source->valid_until != null){
            if($source->valid_until > date('Y-m-d H:i:s')){
                $days = round((strtotime($source->valid_until) - strtotime(date('Y-m-d H:i:s'))) / (60 * 60 * 24));
            }
        }
        $source->days = $days;
        return $source;
    }
}
