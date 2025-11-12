<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- السطر المضاف

// app/Models/Enrollment.php
class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id'];
}