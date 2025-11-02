<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role_id',
        'gender',
        'birthdate',
        'region',
        'profile_image_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthdate' => 'date',
        ];
    }

    // العلاقات
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function courses() // الكورسات التي يقوم بتدريسها
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function enrollments() // الكورسات المسجل بها
    {
        return $this->hasMany(Enrollment::class);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}