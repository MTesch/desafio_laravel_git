<?php

namespace App\Http\Controllers\Ad\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;    

	protected $redirectTo = '/ad';    

	public function showLoginForm()
    {
        return view('ad.auth.login');
    }    

	public function logout(Request $request)
    {
        $this->guard()->logout();        
		return redirect('/ad/login');
    }    

	protected function guard()
    {
        return Auth::guard('ad');
    }
}
