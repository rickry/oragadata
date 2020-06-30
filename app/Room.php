<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function room(){
        return $this->belongsTo('App\Room');
    }

    public function devices(){
        return $this->hasMany('App\Device');
    }
}
