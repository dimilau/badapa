<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'filename'
    ];

    public function thumbnail()
    {
        return basename($this->filename, '.jpeg') . '-thumb.jpeg';
    }
}
