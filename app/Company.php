<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'phonenumber'
    ];

    public
    function contacts ()
    {
        return $this->hasMany('App\Contact');
    }

    public
    function internshiptools ()
    {
        return $this->belongsToMany('App\Internshiptool');
    }

    public
    function addresses ()
    {
        return $this->hasMany('App\Address');
    }
}
