<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_Settings extends Model
{
    protected $casts = [
        'json' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
