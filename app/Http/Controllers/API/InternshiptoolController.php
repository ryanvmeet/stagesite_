<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Internship;
use App\Internshiptool;
use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class InternshiptoolController extends Controller
{
	private
	function validator ($data = [])
	{
		return Validator::make ($data, [
			'tool' => 'required',
		]);
	}

	public
	function update (Request $request, $internship, $contact = FALSE)
	{
		$input = $request->all ();

		$validate = $this->Validator ($input);
		if ($validate->fails ())
		{
			$this->throwValidationException ($request, $validate);
		}
		else
		{

			if (isset($input['internship_user_id']))
			{

				DB::table ('internshiptools')->insert (
					[
						'tool_id'            => $input['tool'],
						'internship_user_id' => $input['internship_user_id']
					]
				);


				return redirect (route ('profile.index'));
			}
			else
			{
				$internship = Internship::findorfail ($internship);
				$contact = Contact::findorfail ($internship->contact_id);

				DB::table ('internshiptools')->insertGetId (
					[
						'company_id'         => $contact->company_id,
						'tool_id'            => $input['tool'],
						'internship_user_id' => NULL,
					]
				);
			}
		}

		return redirect (route ('internship.show', $internship));
	}

	public
	function destroy (Request $request, $internshipid)
	{
		$input = $request->all ();

		if (isset($input['internship_user_id']))
		{
			$tools = DB::table ('internshiptools')->where ('internship_user_id', $input['internship_user_id'])->where ('tool_id', $internshipid)->get ();
			if (is_array ($tools))
			{
				foreach ($tools as $tool)
				{
					Internshiptool::destroy ($tool->id);
				}
			}
			else
			{
				Internshiptool::destroy ($tools->id);
			}

			return redirect (route ('profile.index'));

		}
		else
		{
			$internship = Internship::findorfail ($internshipid);
			$contact    = Contact::findorfail ($internship->contact_id);

			$tools = DB::table ('internshiptools')->where ('company_id', $contact->company_id)->where ('tool_id', $input['tool_id'])->get ();

			if (is_array ($tools))
			{
				foreach ($tools as $tool)
				{
					Internshiptool::destroy ($tool->id);
				}
			}
			else
			{
				Internshiptool::destroy ($tools->id);
			}
		}


		return redirect (route ('internship.show', $internshipid));

	}

}
