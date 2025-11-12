<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- السطر المضاف

// app/Models/AiFeedback.php
// app/Models/AiFeedback.php
class AiFeedback extends Model
{
    use HasFactory;
    protected $fillable = ['consultation_id', 'model_used', 'feedback'];
    public function consultation() { return $this->belongsTo(Consultation::class); }
}