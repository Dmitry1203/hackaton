<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Stage extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;
    //public $timestamps = false;

    protected $fillable = [
        'stage_id',
        'event_id',
        'organizer_id',
        'stage',
        'stage_short',
        'stage_description',
        'stage_description_short',
        'stage_date_end',
        'stage_time_end',
        'solution_required',
    ];

    protected $hidden = [
    ];
}
