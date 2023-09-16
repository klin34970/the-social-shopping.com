<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth, Redirect;

class HomeController extends Controller
{
    public function index()
    {
		if(!Auth::user()->shops->count() || !Auth::user()->suppliers->count())
		{
			return view('backend.home');
		}
		else
		{
		 return Redirect::route('backend.dashboard.index');	
		}
    }
}
