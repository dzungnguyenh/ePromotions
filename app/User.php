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
        'name', 'email', 'password', 'gender', 'dob', 'phone', 'address', 'avatar', 'point', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Method for middleware user
    *
    * @return boolean
    */
    public function isUser()
    {
        return $this->role == 1;
    }

    /**
    * Method for middleware business
    *
    * @return boolean
    */
    public function isBusiness()
    {
        return $this->role == 2;
    }


    /**
    * Method for middleware admin
    *
    * @return boolean
    */
    public function isAdmin()
    {
        return $this->role == 3;
    }
}
