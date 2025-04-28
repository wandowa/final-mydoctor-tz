<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'image', 'introduction', 'body_content',
        'image2', 'another_content', 'image3', 'conclusion', 'faqs', 'author', 'published_at'
    ];

    protected $casts = [
        'faqs' => 'array',
        'published_at' => 'datetime',
    ];
}