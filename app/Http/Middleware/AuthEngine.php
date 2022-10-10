<?php namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Session;

class AuthEngine
{

    public function handle($request, Closure $next){
        define('USER_ID', Session::get('user_id'));
        if ($request->segment(1) == null && !(USER_ID && USER_ID != '')) {
            session()->flush();

            \Session::flash('error', trans('auth.mustLogin'));
            return Redirect('/login');
        }

        if (in_array($request->segment(1), ['login','impersonate','getResetPassword','changePassword','completeReset'])) {
            return $next($request);
        }

        if (!(USER_ID && USER_ID != '')) {
            session()->flush();

            \Session::flash('error', trans('auth.mustLogin'));
            return Redirect('/login');
        }

        define('FULL_NAME', Session::get('name'));
        define('IDENTIFIER', Session::get('identifier'));
        define('PHONE', Session::get('phone'));
        define('EMAIL', Session::get('email'));
        define('DAYS', Session::get('days'));
        define('GROUP_ID', Session::get('group_id'));
                
        define('IS_ADMIN', Session::get('group_id') == 1 ? true : false);
        define('PERMISSIONS', []);

        return $next($request);
    }
}
