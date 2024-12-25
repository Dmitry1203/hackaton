<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Application extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;
    //public $timestamps = false;

    protected $fillable = [
        'user_id',
        'team_id',
        'message',
        'status'
    ];

    protected $hidden = [
    ];
}
