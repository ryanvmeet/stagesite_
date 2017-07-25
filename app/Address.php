<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $fillable
		= [
			'street',
			'postcode',
			'state',
			'streetnumber',
			'company_id',
			'education_offer_id'
		];

	public
	function locations ()
	{
		return $this->belongsTo ('App\Location');
	}

	public
	function companies ()
	{
		return $this->belongsTo ('App\Company');
	}
}