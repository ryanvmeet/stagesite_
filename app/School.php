<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class School extends Model
{
	protected $fillable
		= [
			'name',
		];

	public
	function contacts ()
	{
		return $this->hasMany('App\Contact');
	}

	public
	function locations ()
	{
		return $this->hasMany('App\Location');
	}
}