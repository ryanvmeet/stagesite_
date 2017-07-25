<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipUser extends Model
{
	protected $fillable = [
		'internship_id',
		'user_id',
	];

	public
	function internship ()
	{
		return $this->belongsTo ('App\Internship');
	}

	public
	function users ()
	{
		return $this->belongsTo ('App\User');
	}
	public
	function internshiptools ()
	{
		return $this->belongsToMany ('App\Internshiptool');
	}
	public
	function reviews ()
	{
		return $this->hasMany ('App\Review');
	}
}
