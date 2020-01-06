<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;    

	protected $redirectTo = '/admin';    

	public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);

    }    

	public function broker()
    {
        return Password::broker('admins');
    }    

	protected function guard()
    {
        return Auth::guard('admin');
    }
}
