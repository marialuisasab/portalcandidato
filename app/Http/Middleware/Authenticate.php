<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    { /*
        if (! $request->expectsJson()) {
            if(Route::is('admin.*')){
                return route('admin.login');
            }

            return route('login');
        }
       */
            $login = "";
            if(Auth::guard('admin')->check()){
                $login = 'admin/login';           
            }
            else{
                 $login = 'login';
            }
            //dd($login);
            return redirect()->guest($login);

        
    }
}
