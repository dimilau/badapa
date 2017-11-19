<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offender extends Model
{
    public function offences()
    {
        return $this->hasMany('App\Offence');
    }

    public function approved_offences()
    {
        return $this->offences()->where('approved', '=', 1);
    }

    protected $fillable = [
    	'ic_passport',
        'name',
        'approved'
    ];
}
