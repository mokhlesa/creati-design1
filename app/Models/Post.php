<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- السطر المضاف

use Illuminate\Database\Eloquent\Model;

// app/Models/Post.php
class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'content', 'image_url', 'published_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function category() { return $this->belongsTo(Category::class); }
}