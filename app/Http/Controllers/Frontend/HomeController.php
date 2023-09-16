<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Frontend\UserRequest;

use Validator, Redirect;

class HomeController extends Controller
{
	public function pop3()
    {
        return view('frontend.pop3');
    }
	
	public function imap()
    {
        return view('frontend.imap');
    }
	
	public function smtp()
    {
        return view('frontend.smtp');
    }
	
	public function mail()
    {
        return view('frontend.mail');
    }
	
    public function index()
    {
        return view('frontend.home');
    }
	
	public function registration()
	{
		return view('auth.registration');
	}
	
	public function postRegistration(UserRequest $request)
	{
		$user = User::create([
            'lastname' => strip_tags($request->get('lastname')),
			'firstname' => strip_tags($request->get('firstname')),
            'email' => strip_tags($request->get('email')),
            'password' => bcrypt(strip_tags($request->get('password'))),
        ]);
		
		$user->assignRole('shopper');
		
		return Redirect::route('auth.login');
	}
	
	public function termsAndConditions()
	{
		return view('frontend.terms_and_conditions');
	}
	
	public function privacyPolicy()
	{
		return view('frontend.privacy_policy');
	}
}
