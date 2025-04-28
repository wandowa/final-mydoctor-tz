<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    protected $fillable = ['title', 'description', 'bullet_points'];

    protected $casts = [
        'bullet_points' => 'array',
    ];
}