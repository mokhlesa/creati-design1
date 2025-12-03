<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- السطر المضاف

// app/Models/Consultation.php
class Consultation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'image_url', 'status', 'prompt', 'feedback'];
    public function feedback() { return $this->hasOne(AiFeedback::class); }
    public function user() { return $this->belongsTo(User::class); }
}
