<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;    

	protected $redirectTo = '/admin';    

	public function showLoginForm()
    {
        return view('admin.auth.login');
    }    

	public function logout(Request $request)
    {
        $this->guard()->logout();        
		return redirect('/admin/login');
    }    

	protected function guard()
    {
        return Auth::guard('admin');
    }
}
