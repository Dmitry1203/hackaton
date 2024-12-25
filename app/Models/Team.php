<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;

    //public $timestamps = false;

    protected $fillable = [
        'user_id',
        'team_id',
        'team',
        'description',
        'chat',
        'logo'
    ];

    protected $hidden = [
    ];

}
