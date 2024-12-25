<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;
    //public $timestamps = false;

    protected $fillable = [
        'event_id',
        'organizer_id',
        'event_name',
        'event_text',
        'organizer_name',
        'organizer_text',
        'logo'
    ];

    protected $hidden = [
    ];
}
