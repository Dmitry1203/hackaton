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

    //если надо назвать таблицу пользователей не user
    //protected $table = 'your_table_name';
    //public $timestamps = false;

    protected $fillable = [
        'user_id',
        'email',
        'name',
        'surname',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
