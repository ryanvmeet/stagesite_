<?php

namespace App\Http\Controllers\API;

use App\Address;
use App\School;
use App\Location;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class LocationController extends Controller
{
	private
	function validator ($data = [])
	{
		return Validator::make ($data, [
			'streetnumber' => 'required',
			'street'       => 'required',
			'state'        => 'required',
			'postcode'     => 'required',
		]);
	}

	public
	function update (Request $request, $address)
	{
		$input = $request->all ();

		$validate = $this->Validator ($input);
		if ($validate->fails ())
		{
			$this->throwValidationException ($request, $validate);
		}
		else
		{
			//$locations = DB::table ('addresses')->where ('id', $address->id)->get ('location_id');

			$address = Address::where ('id', $address)->get ()->first ();

			$address->update ($input);

			$location = Location::where ('id', $address->location_id)->get ()->first ();

			$school = $location->school_id;
		}

		return redirect (route ('school.show', compact ('school')));
	}

	public
	function store (Request $request)
	{
		$input    = $request->all ();
		$validate = $this->validator ($input);
		if ($validate->fails ())
		{
			$this->throwValidationException ($request, $validate);
		}
		else
		{
			$location = DB::table ('locations')->insertGetId (
				['school_id' => $input['school']]
			);

			DB::table ('addresses')->insertGetId (
				[
					'streetnumber' => $input['streetnumber'],
					'street'       => $input['street'],
					'postcode'     => $input['postcode'],
					'state'        => $input['state'],
					'location_id'  => $location,
				]	
			);
			
			$school = School::findOrFail ($input['school']);

		}

		return redirect (route ('school.show', compact ('school')));
	}

	public
	function destroy ($address)
	{

		$location = Address::where ('id', $address)->get ()->pluck ('location_id');
		$address = Address::where ('id', $address)->get ();
		$school = Address::where ('id', $location)->get ()->pluck ('school_id');

		Address::destroy ($address);
		Location::destroy ($location);

		return redirect()->back();

	}
}
