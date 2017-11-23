<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offence extends Model
{
    public function attachments()
    {
        return $this->hasMany('App\Attachment');
    }

    public function offender()
    {
        return $this->belongsTo('App\Offender');
    }

    protected $fillable = [
        'description',
    	'company_worked',
    	'offence_type'
    ];
}
