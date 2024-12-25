<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Watched extends Model
{
    //use HasFactory;
    protected $table = 'video_watched';
    protected $fillable = [
        'user_id',
        'video_id',
    ];

}
