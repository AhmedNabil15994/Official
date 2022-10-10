<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

    use \TraitsFunc;

    protected $table = 'users';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    public $timestamps = false;


    static function getOne($id){
        return self::where('id', $id)
            ->first();
    }

    static function getUserByUsername($username, $notId=false){
        $dataObj = self::where('username', $username);

        if ($notId != false) {
            $dataObj->whereNotIn('id', [$notId]);
        }    

        return $dataObj->first();
    }

    static function checkUserByEmail($email, $notId = false){
        $dataObj = self::where('email', $email);

        if ($notId != false) {
            $dataObj->whereNotIn('id', [$notId]);
        }

        return $dataObj->first();
    }

    static function checkUserByPhone($phone, $notId = false){
        $dataObj = self::where('phone', $phone);
;

        if ($notId != false) {
            $notId = (array) $notId;
            $dataObj->whereNotIn('id', $notId);
        }

        return $dataObj->first();
    }

    static function generateObj($source){
        $sourceArr = $source->get();
        // $sourceArr = $sourceArr->paginate(PAGINATION);

        $list = [];
        foreach($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        $data['data'] = $list;
        // $data['pagination'] = \Helper::GeneratePagination($sourceArr);
        return $data;
    }
    

    static function getData($source) {
        $data = new  \stdClass();
        $data->id = $source->id;
        $data->name = $source->name;
        $data->email = $source->email;
        $data->phone = $source->phone;
        $data->identifier = $source->identifier;
        $data->days = $source->days;
        $data->group_id = $source->group_id;
        return $data;
    }

    static function checkUserPermissions($userObj) {
        $endPermissionUser = [];
        $endPermissionGroup = [];

        $groupObj = $userObj->Group;
        $groupPermissions = $groupObj != null ? $groupObj->rules : null;

        $groupPermissionValue = unserialize($groupPermissions);
        if($groupPermissionValue != false){
            $endPermissionGroup = $groupPermissionValue;
        }
        $extra_rules = $userObj->extra_rules != null ? unserialize($userObj->extra_rules) : [];
        $permissions = (array) array_unique(array_merge($endPermissionUser, $endPermissionGroup,$extra_rules));

        return $permissions;
    }

    static function userPermission(array $rule){

        if(USER_ID && IS_ADMIN == false) {
            return count(array_intersect($rule, PERMISSIONS)) > 0;
        }
                            // <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $data->data->created_at }}</span>

        return true;
    }

}
