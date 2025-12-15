<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- السطر المضاف

// app/Models/OrderItem.php
class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'course_id', 'price'];

    /**
     * Get the course associated with the order item.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
