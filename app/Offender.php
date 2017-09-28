<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offender extends Model
{
    public function offences()
    {
        return $this->hasMany('App\Offence');
    }

    protected $fillable = [
    	'ic_passport',
    	'name'
    ];
}
