<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Inspection;
use App\Http\Requests;


class InspectionsController extends Controller
{
    public function index(Inspection $inspection)
    { 
    	$details = $inspection->getInspectionDetails($inspection->inspection_visit_id,$inspection->inspection_number);
    	$inspection->load('business');
    	return view('inspection.index', compact('inspection'), compact('details'));
    }
}
