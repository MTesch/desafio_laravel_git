<?php

//namespace App\Http\Controllers\User;
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
	{
    	$this->middleware('auth:user');
	}

	public function index()
	{
	    return view('user.home');
	}
}
