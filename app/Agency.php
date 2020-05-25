<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Agency extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    protected $guard = 'agency';

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'photo', 'country', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

}
