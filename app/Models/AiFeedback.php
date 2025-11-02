<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiFeedback extends Model
{
    use HasFactory;
    protected $fillable = ['consultation_id', 'model_used', 'feedback'];
    public function consultation() { return $this->belongsTo(Consultation::class); }
}