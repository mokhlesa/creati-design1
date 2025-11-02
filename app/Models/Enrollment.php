<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Enrollment.php
class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id'];
}