<?php

namespace App\Http\Controllers\Web;

use App\Company;
use App\Contact;
use App\School;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
	//
	public
	function index ()
	{
		$company = Company::all ();

		return view ('company.index', compact ('company'));
	}

	public
	function show ($company)
	{
		$company = Company::findOrFail ($company);

		$contacten = DB::table ('contacts')->where ('company_id', $company->id)->get ();
		foreach ($contacten as $contact)
		{
			$stages[] = DB::table ('internships')->where ('contact_id', $contact->id)->get ();
			$users = DB::table ('users')->where (['id' => $contact->id, 'role_id' => 3])->get ();
			foreach ($users as $user)
			{
			}
		}
		if (isset($stages)){
			foreach ($stages as $array)
			{
				foreach ($array as $internship)
				{
					$statusarray   = DB::table ('statuses')->where ('id', $internship->status_id)->pluck ('name');
					$internship->status = $statusarray[0];

					$internshipUsers = DB::table ('internship_users')->where ('internship_id', $internship->id)->get ();

					foreach ($internshipUsers as $internshipUser)
					{

						$usertmp = User::where ('id', $internshipUser->user_id)->get ();
						if ($usertmp[0]->role_id == 3)
						{
							$users[] = $usertmp[0];
						}

					}
					if (isset($users))
					{
						foreach ($users as $user)
						{
							$tmp                  = DB::table ('contacts')->where ('id', $user->contact_id)->get ();
							$internshipcontacts[] = $tmp[0];
						}
					}
					else{
						$internshipcontacts = NULL;
					}

				}
			}
		}
		else {
			$stages = NULL;
			$internshipUsers = NULL;
		}

		

		return view ('company.show', compact ('company', 'contacten', 'stages', 'internshipUsers'));
	}

	public
	function create ()
	{
		return view ('company.create', compact ('company'));
	}

	public
	function edit ($company)
	{
		$company = Company::findOrFail ($company);

		return view ('company.edit', compact ('company'));
	}

}
