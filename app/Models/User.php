<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'nationality',
        'identity',
        'email',
        'phone',
        'address',
        'state',
        'city',
        'zipcode',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
