<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = ['title', 'description', 'bullet_points'];

    protected $casts = [
        'bullet_points' => 'array', // Cast JSON to array
    ];
}