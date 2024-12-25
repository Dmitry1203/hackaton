<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Result extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;
    //public $timestamps = false;

    protected $fillable = [
        'team',
        'result',
    ];
}
