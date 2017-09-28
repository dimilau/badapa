<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offence extends Model
{
    protected $fillable = [
    	'company_worked',
    	'offence_type'
    ];
}
