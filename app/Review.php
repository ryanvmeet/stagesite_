<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
		'review',
		'mark',
		'status_id',
		'internship_id',
	];
	
	public
	function internship_users ()
	{
		return $this->belongsTo('App\InternshipUser');
	}


	public
	function statuses ()
	{
		return $this->belongsTo('App\Status');
	}
	
	
}
