<?php namespace App\Http\Controllers;

use Request;
use Response;
use URL;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller {

	use \TraitsFunc;
    /**
     * @hideFromAPIDocumentation
     *
    */
	public function register() {
        $dateTime = DATE_TIME;
        $input = Request::all();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
        ];

        $message = [
            'name.required' => "Sorry Name Required",
            'email.required' => "Sorry Email Required",
            'email.email' => "Sorry Email Must Be Email Type",
            'password.required' => "Sorry Password Required",
            'phone.required' => "Sorry Phone Required",
        ];

        $validate = \Validator::make($input, $rules, $message);

        if($validate->fails()){
            return \TraitsFunc::ErrorMessage($validate->messages()->first(), 400);
        }
            
        $checkPhone = User::where('phone',$input['phone'])->first();
        if($checkPhone != null) {
            return \TraitsFunc::ErrorMessage("This phone exist, Please choose another phone!", 400);
        }

        $checkEmail = User::where('email',$input['email'])->first();
        if($checkEmail != null) {
            return \TraitsFunc::ErrorMessage("This email exist, Please choose another email!", 400);
        }

        $userObj = new User();        
        $userObj->email = $input['email'];            
        $userObj->name = $input['name'];
        $userObj->email_verified_at = $dateTime;
        $userObj->phone = $input['phone'];
        $userObj->identifier = md5($input['phone'].$input['email']);
        $userObj->password = \Hash::make($input['password']);
        $userObj->created_at = $dateTime;
        $userObj->save();

        $dataObj = self::LoginAction($userObj);

        $statusObj['data'] = new \stdClass();
        $statusObj['data'] = $dataObj;
        $statusObj['status'] = \TraitsFunc::SuccessResponse("Register Success");
		return \Response::json((object) $statusObj);
    }

    static function LoginAction($userObj) {
        $dateTime = DATE_TIME;
        $dataObj = new \stdClass();
        $dataObj->email = $userObj->email;
        $dataObj->phone = $userObj->phone;
        $dataObj->name = $userObj->name;
        $dataObj->token = $userObj->identifier;
        return $dataObj;
    }

    /**
     * @hideFromAPIDocumentation
     *
    */
    public function login(){
    	$input = Request::all();

        $rules = [
            'password' => 'required',
            'phone' => 'required',
        ];

        $message = [
            'password.required' => "Sorry Password Required",
            'phone.required' => "Sorry Phone Required",
        ];

        $validate = \Validator::make($input, $rules, $message);

        if($validate->fails()){
            return \TraitsFunc::ErrorMessage($validate->messages()->first(), 400);
        }

        $userObj = User::where('phone',$input['phone'])->first();
        if(!$userObj) {
            return \TraitsFunc::ErrorMessage("This phone doesn't exist, Please check your phone number!", 400);
        }

        $checkPassword = \Hash::check($input['password'], $userObj->password);
        if ($checkPassword == null) {
            return \TraitsFunc::ErrorMessage("Sorry Password wrong, Please try again", 400);
        }

        $dataObj = self::LoginAction($userObj);

        $statusObj['data'] = new \stdClass();
        $statusObj['data'] = $dataObj;
        $statusObj['status'] = \TraitsFunc::SuccessResponse("Login Success");
		return \Response::json((object) $statusObj);
    }

}
