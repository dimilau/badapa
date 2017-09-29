<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offence extends Model
{
    public function attachments()
    {
        return $this->hasMany('App\Attachment');
    }

    protected $fillable = [
    	'company_worked',
    	'offence_type'
    ];
}
