<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index(Request $request)
    {	
    	 // If a region has already been set
    	 if($request->cookie('region'))
    	 {
    		return redirect('businesses');
    	 }
    	return view('index');
    	 //->withCookie(cookie()->forever('region', 'test'))
    }
}
