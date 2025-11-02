<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'instructor_id',
        'price',
        'published_at',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }
}