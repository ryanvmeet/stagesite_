<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email',
		'password',
		'role_id',
		'contact_id',
		'validation',
		'school_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	public
	function getRole ()
	{
		if (Auth::check ())
		{
			$role = Role::findOrFail (Auth::user ()->role_id);

				return $role->role;
			
		}
	}
	public
	function getName ()
	{
		if (Auth::check ())
		{
			$contact = Contact::findOrFail (Auth::user ()->contact_id);
			return $contact->firstname;
		}
	}

	public
	function loopStage ()
	{
		if (Auth::check ())
		{
			
		}
	}

}
