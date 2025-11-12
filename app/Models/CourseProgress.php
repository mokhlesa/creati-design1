<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- السطر المضاف

// app/Models/CourseProgress.php
class CourseProgress extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'lesson_id', 'completed_at'];
}