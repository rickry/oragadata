<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->hasMany('App\User');
    }

    public function rooms(){
        return $this->hasMany('App\Room');
    }
}
