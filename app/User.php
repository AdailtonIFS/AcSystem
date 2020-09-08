<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    protected $primaryKey = 'registration';
    protected $table = 'users';
    public $fillable = ['registration','category_id','name','email','status','password'];
    protected $hidden = [
        'password', 'remember_token'
    ];
}
