<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crebo extends Model
{
	protected $fillable
		= [
			'name',
			'number',
		];

	public
	function cohorts ()
	{
		return $this->hasMany ('App\Education_offer');
	}

}
