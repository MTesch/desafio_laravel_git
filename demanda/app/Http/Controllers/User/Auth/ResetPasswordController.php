<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;    

	protected $redirectTo = '/user';    

	public function showResetForm(Request $request, $token = null)
    {
        return view('user.auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);

    }    

	public function broker()
    {
        return Password::broker('users');
    }    

	protected function guard()
    {
        return Auth::guard('user');
    }
}
