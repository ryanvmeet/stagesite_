<?php

namespace App\Http\Controllers\API;

use App\School;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Location;
use Validator;

class SchoolController extends Controller
{
	private
	function validator ($data = [])
	{
		return Validator::make ($data, [
			'name' => 'required',
		]);
	}

	public
	function update (Request $request, $school)
	{
		$input = $request->all ();

		$validate = $this->validator ($input);
		if ($validate->fails ())
		{
			$this->throwValidationException ($request, $validate);
		}
		else
		{
			$school = School::findorFail ($school);

			$school->update ($input);

		}

		return redirect (route ('school.show', $school->id));
	}

	public
	function destroy ($school)
	{

		if (School::destroy ($school))
		{
			return redirect (route ('school.index'));
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

			$school = DB::table ('schools')->insertGetId (
				['name' => $input['name']]
			);

			$location = DB::table ('locations')->insertGetId (
				['school_id' => $school]
			);

			DB::table ('addresses')->insert (
				[
					'streetnumber' => $input['streetnumber'],
					'street'       => $input['street'],
					'postcode'     => $input['postcode'],
					'state'        => $input['state'],
					'location_id'  => $location,
				]
			);

		}

		return redirect (route ('school.index'));
	}
}
