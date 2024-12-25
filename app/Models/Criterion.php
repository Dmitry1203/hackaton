<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Criterion extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;
    //public $timestamps = false;

    protected $table = 'criteria';

    protected $fillable = [
        'event_id',
        'organizer_id',
        'criteria',
    ];

    protected $hidden = [
    ];
}
