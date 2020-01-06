<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;    

	protected $redirectTo = '/user';    

	public function showLoginForm()
    {
        return view('user.auth.login');
    }    

	public function logout(Request $request)
    {
        $this->guard()->logout();        
		return redirect('/user/login');
    }    

	protected function guard()
    {
        return Auth::guard('user');
    }
}
