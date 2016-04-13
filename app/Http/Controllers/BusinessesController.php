<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Http\Requests;

class BusinessesController extends Controller
{
   public function index()
    {
    	$businesses = Business::paginate(10);
    	return view('business.index', compact('businesses'));
    }

    public function region($region)
    {
    	if(!is_numeric($region))
    	{
    		abort(404);
    	}

    	$businesses = Business::where('region', '=', $region)->paginate(10);
    	return view('business.index', compact('businesses'));
    }

    public function detail(Business $business)
    {
    	$business->load(['inspections' => function($query){
    		$query->orderBy('inspection_date', 'desc');
    	}]);

    	

    	return view('business.detail', compact('business'));
    }
}
