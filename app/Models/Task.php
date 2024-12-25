<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'event_id',
        'organizer_id',
        'task_id',
        'name',
        'text',
    ];

}
