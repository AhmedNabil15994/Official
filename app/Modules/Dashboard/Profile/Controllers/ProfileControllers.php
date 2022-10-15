<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileControllers extends Controller {

    use \TraitsFunc;

    public function index(){   
        $input = \Request::all();
        $data = User::find(USER_ID);
        return view('Dashboard.Profile.Views.index')->with('data',(object) $data);
    }

    public function updateProfile(){
        $input = \Request::all();
        $mainUserObj = User::find(USER_ID);
        

        if(isset($input['email']) && !empty($input['email'])){
            $userObj = User::checkUserByEmail('email',$input['email'],USER_ID);
            $mainUserObj->email = $input['email'];
        }
        
        if(isset($input['check']) && !empty($input['check'])){
            $userObj = User::checkUserByPhone('phone',str_replace('+','',$input['check']),USER_ID);
            $mainUserObj->phone = str_replace('+','',$input['check']);
        }

        if(isset($input['name']) && !empty($input['name'])){
            $mainUserObj->name = $input['name'];
        }

        if(isset($input['password']) && !empty($input['password'])){
            $rules = [
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ];

            $message = [
                'password.required' => trans('auth.passwordValidation'),
                'password.confirmed' => trans('auth.passwordValidation2'),
                'password_confirmation.required' => trans('auth.passwordValidation3'),
            ];

            $validate = \Validator::make($input, $rules, $message);
            if($validate->fails()){
                Session::flash('error', $validate->messages()->first());
                return back()->withInput();
            }

            $password = $input['password'];
            $mainUserObj->password = \Hash::make($password);
        }

        $mainUserObj->save();
        Session::flash('success', trans('main.editSuccess'));
        return back()->withInput();
    }
}
