<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
	public
	function update (Request $request, $contact)
	{
		$input = $request->all ();

		$user    = DB::table ('users')->where ('contact_id', $contact)->first ();
		$updated = $user;

		DB::table ('users')
		  ->where ('id', $updated->id)
		  ->update (['validation' => 1]);

		return redirect (route ('verification.index'));
	}

	public
	function destroy (Request $request, $contact)
	{

		if (User::destroy ($contact))
		{
			return redirect (route ('verification.index'));
		}

		return response (0, 200);

	}
}
