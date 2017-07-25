<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
	protected $fillable
		= [
			'name',
			'schoolyear',
			'crebo_id'
		];

	public
	function education_offers ()
	{
		return $this->hasMany ('App\Education_offer');
	}


}
