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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'description',
    	'company_worked',
        'offence_type',
        'approved',
    ];
}
