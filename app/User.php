<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function building()
    {
        return $this->belongsTo('App\Building');
    }

    public function current()
    {
        return $this->belongsTo('App\Room', 'current_room');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function settings()
    {
        return $this->hasMany('App\Room_Settings', 'user_id');
    }
}
