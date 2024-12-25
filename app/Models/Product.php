<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // created_at и updated_at не будут заполняться автоматически
    public $timestamps = false;

    protected $fillable = [
        'name',
        'num',
    ];

}
