<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- السطر المضاف

// app/Models/StudentShowcase.php
class StudentShowcase extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id', 'title', 'description', 'image_url', 'is_featured'];
    public function user() { return $this->belongsTo(User::class); }
    public function course() { return $this->belongsTo(Course::class); }
}
