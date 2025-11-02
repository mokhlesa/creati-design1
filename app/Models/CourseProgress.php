<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/CourseProgress.php
class CourseProgress extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'lesson_id', 'completed_at'];
}