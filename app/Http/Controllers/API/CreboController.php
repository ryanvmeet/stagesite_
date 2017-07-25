<?php

namespace App\Http\Controllers\API;

use App\Cohort;
use App\Crebo;
use App\Education_offer;
use App\Location;
use App\School;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class CreboController extends Controller
{
	private
	function validator ($data = [])
	{
		return Validator::make ($data, [
			'number'    => 'required',
			'name'      => 'required',
			'startyear' => 'required',
			'endyear'   => 'required',
			'school'    => 'required',
			'location'  => 'required'
		]);
	}

	public
	function destroy ($education)
	{
		if (Education_offer::destroy ($education))
		{
			return redirect (route ('crebo.index'));
		}

		return response (0, 200);
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

			$loc = $input['location'];
			$location = $users = DB::table('addresses')->select('location_id')->where('street', $loc)->get();

			$crebo = DB::table ('crebos')->insertGetId (
				[
					'name'   => $input['name'],
					'number' => $input['number'],
				]);

			$cohort = DB::table ('cohorts')->insertGetId (
				[
					'startyear' => $input['startyear'],
					'endyear'   => $input['endyear'],
				]);

			DB::table ('education_offers')->insert (
				[
					'name' => $input['school'] . " " . $input['location'] . " " . $input['name'] . "(" . $input['number'] . ") " . $input['startyear'] . " " . $input['endyear'] ,
					'crebo_id' => $crebo ,
					'cohort_id' => $cohort ,
					'location_id' => $location[0]->location_id
				]);
		}
		return redirect (route ('crebo.index'));
	}
}
