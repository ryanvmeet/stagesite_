<?php

namespace App\Http\Controllers\Web;

use App\Crebo;
use App\Education_offer;
use App\School;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CreboController extends Controller
{
	public
	function edit ($crebo)
	{
		$crebo = Crebo::findOrFail ($crebo);

		return view ('crebos.edit', compact ('crebo'));
	}

	public
	function create ()
	{
		$schools = School::all ();

		foreach ($schools as $school)
		{
			$locations = DB::table ('locations')->where ('school_id', $school->id)->get ();

			foreach ($locations as $location)
			{
				$addresses[] = DB::table ('addresses')->where ('location_id', $location->id)->get ();
			}
			$school_all_info[] = [
				'school' => $school,
				'location' => $addresses
			];
		}
		

		return view ('crebos.create', compact ('school_all_info'));
	}

	public
	function index ()
	{
		$infos = Education_offer::all();

		return view ('crebos.index', compact ('infos'));
	}
}
