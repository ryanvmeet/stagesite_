<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $fillable = [
		'school_id',
	];
	
	public
	function schools ()
	{
		return $this->belongsTo('App\School');
	}

	public
	function education_offers ()
	{
		return $this->hasMany('App\Education_offer');
	}
	public
	function addresses ()
	{
		return $this->hasMany('App\Addres');
	}
}
