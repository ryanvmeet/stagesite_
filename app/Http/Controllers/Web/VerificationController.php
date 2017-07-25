<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
	public
	function index ()
	{
		$contacts = DB::table ('users')->where ('validation', 0)->get ();

		return view ('verification.index', compact ('contacts'));
	}
}
