<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pronostic() {
        return $this->hasMany(Pronostic::class);
    }

    public function isAdmin()
    {
        if ($this->role == 2) {
            return true;
        }
    }

    public function isMember()
    {
        if ($this->role >= 1) {
            return true;
        }
    }
}
