<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offender extends Model
{
    public $incrementing = false;
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) \Uuid::generate(4);
        });
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function offences()
    {
        return $this->hasMany('App\Offence');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function approved_offences()
    {
        return $this->offences()->where('approved', '=', 1);
    }

    protected $fillable = [
    	'ic_passport',
        'name',
        'country',
        'approved'
    ];
}
