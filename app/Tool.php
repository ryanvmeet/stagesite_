<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status_id'
    ];

    public
    function internshiptools ()
    {
        return $this->belongsToMany('App\Internshiptool');
    }

    public
    function statuses ()
    {
        return $this->belongsTo('App\Status');
    }
}
