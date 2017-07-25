<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'surename',
        'insertion',
        'firstname',
        'email',
        'phonenumber',
        'company_id',
        'school_id',
        'education_offer_id'
    ];

    public
    function schools ()
    {
        return $this->belongsTo('App\School');
    }

    public
    function companies ()
    {
        return $this->belongsTo('App\Company');
    }

    public
    function internships ()
    {
        return $this->hasMany('App\Internship');
    }

    public
    function users ()
    {
        return $this->belongsTo('App\User');
    }
}
