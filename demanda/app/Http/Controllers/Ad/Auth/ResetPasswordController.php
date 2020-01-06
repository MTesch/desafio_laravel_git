<?php

namespace App\Http\Controllers\Ad\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;    

	protected $redirectTo = '/ad';    

	public function showResetForm(Request $request, $token = null)
    {
        return view('ad.auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);

    }    

	public function broker()
    {
        return Password::broker('ads');
    }    

	protected function guard()
    {
        return Auth::guard('ad');
    }
}
