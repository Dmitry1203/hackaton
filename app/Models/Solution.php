<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Solution extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;
    //public $timestamps = false;

    protected $fillable = [
        'event_id',
        'team_id',
        'stage_id',
        'solution',
    ];
}
