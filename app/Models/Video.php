<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //use HasFactory;
    protected $table = 'video';
    protected $fillable = [
        'video_id',
        'name',
        'code ',
    ];

    protected $hidden = [
    ];

}