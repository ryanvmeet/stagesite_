<?php

namespace App\Http\Controllers\Web;

use App\Review;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
	public
	function edit ($review)
	{
		$review = Review::findOrFail ($review);

		return view ('review.edit', compact ('review'));
	}
}
