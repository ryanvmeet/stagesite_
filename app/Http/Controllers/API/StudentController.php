<?php

namespace App\Http\Controllers\Api;

use App\Internship;
use App\InternshipUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class StudentController extends Controller
{
	private
	function validator ($data = [])
	{
		return Validator::make ($data, [
			'internship_id' => 'required',
		]);
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
			if (Auth::user()->getRole() == 'student' OR Auth::user()->getRole() == 'admin')
			{
				InternshipUser::create ([
											'user_id'       => Auth::user ()->id,
											'internship_id' => $input['internship_id'],
										]);
				$internship = Internship::findorfail($input['internship_id']);
				$internship->update(['status_id' => 6]);
			}
			/*$internship = $input['internship_id'];
			$internship = Internship::findorfail($internship);*/
		}
		return redirect (route ('internship.show', $input['internship_id']));
	}

	public
	function update ($internship)
	{
		$internship = Internship::findorfail($internship);
		$internship->update(['status_id' => 7]);

		return redirect (route ('internship.show', $internship));
	}
}
