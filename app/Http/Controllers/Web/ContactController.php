<?php

namespace App\Http\Controllers\Web;

use App\Company;
use App\Contact;
use App\School;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

	public
	function index ()
	{
		$contacts = Contact::all ();

		return view ('contact.index', compact ('contacts'));
	}

	public
	function show ($contact)
	{

		$contact = Contact::findOrFail ($contact);
		if (!empty($contact->company_id) or $contact->company_id != NULL)
		{
			$company = Company::findOrFail ($contact->company_id);
		}
		else
		{
			$company = NULL;
		}

		if (!empty($contact->school_id) or $contact->school_id != NULL)
		{
			$school = School::findorFail ($contact->school_id);
		}
		else
		{
			$school = NULL;
		}

		return view ('contact.show', compact ('contact', 'company', 'school'));
	}

	public
	function create ()
	{
		$companies = Company::all ();

		foreach ($companies as $company)
		{
			$companyArray[$company->id] = $company->name;
		}

		return view ('contact.create', compact ('contact', 'companyArray'));

	}

	public
	function edit ($contact)
	{

		$companies = Company::all ();

		$schools = School::all ();

		foreach ($schools as $school)
		{
			$schoolsArray[$school->id] = $school->name;
		}

		foreach ($companies as $company)
		{
			$companyArray[$company->id] = $company->name;
		}

		$contact = Contact::findOrFail ($contact);

		return view ('contact.edit', compact ('contact', 'companyArray', 'schoolsArray'));
	}
}
