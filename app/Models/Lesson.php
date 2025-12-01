<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'content',
        'lesson_type',
        'video_url',
        'attachment_path',
        'order',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}