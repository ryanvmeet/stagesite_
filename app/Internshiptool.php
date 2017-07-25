<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internshiptool extends Model
{
	protected $fillable = [
		'tool_id',
		'internship_user_id',
		'company_id',
		'tool_id',
	];

	public
	function tools ()
	{
		return $this->belongsTo ('App\Tool');
	}

	public
	function internship_users ()
	{
		return $this->belongsTo ('App\InternshipUser');
	}

	public
	function companies ()
	{
		return $this->belongsTo ('App\Company');
	}
}
