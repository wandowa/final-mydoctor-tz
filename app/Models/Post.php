<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'author', 'published_at',
        'image', 'introduction', 'body_content', 'image2',
        'another_content', 'image3', 'conclusion'
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
}