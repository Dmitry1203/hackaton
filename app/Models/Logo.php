<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{

    protected $fillable = [
        'event_id',
        'organizer_id',
        'logo',
    ];

}
