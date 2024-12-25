<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Invitation extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;
    //public $timestamps = false;

    protected $fillable = [
        'author_id',
        'team_id',
        'email',
        'status',
        'invited_user_id'
    ];

    protected $hidden = [
    ];
}
