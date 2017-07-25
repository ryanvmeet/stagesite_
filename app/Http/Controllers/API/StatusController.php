<?php

namespace App\Http\Controllers\API;

use App\Categorie;
use App\Company;
use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class StatusController extends Controller
{
	private
	function validator ($data = [])
	{
		return Validator::make ($data, [
			'name' => 'required',
		]);
	}


	public
	function store (Request $request)
	{
		$input        = $request->all ();
		$categorie_id = Categorie::findorfail ($input['categorie_id']);
		Status::insert (
			[
				'name'         => $input['name'],
				'categorie_id' => $categorie_id->id,
			]);
		
		return redirect (route ('status.index'));
	}

	public
	function update (Request $request, $status)
	{
		$input = $request->all ();

		$validate = $this->validator ($input);
		if ($validate->fails ())
		{
			$this->throwValidationException ($request, $validate);
		}
		else
		{
			$status = Status::findorFail ($status);

			$status->update ($input);

		}

		return redirect (route ('status.index'));
	}

	public
	function destroy ($status)
	{

		if (Status::destroy ($status))
		{
			return redirect (route ('status.index'));
		}

		return response (0, 200);
	}
}
