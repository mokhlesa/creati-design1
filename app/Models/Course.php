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
        'image',
        'instructor_id',
        'price',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the instructor that owns the course.
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    /**
     * The lessons that belong to the course.
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    /**
     * The users that are enrolled in the course.
     */
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }
}