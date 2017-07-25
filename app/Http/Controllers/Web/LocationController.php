<?php

namespace App\Http\Controllers\Web;

use App\Address;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Location;

class LocationController extends Controller
{
	public
	function edit ($location)
	{

		$location = Address::findorFail ($location);

		return view ('locations.edit', compact ('location'));
	}

	public function create ($school) 
	{
		return view('locations.store', compact('school'));
	}

}
