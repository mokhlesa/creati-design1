<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/OrderItem.php
class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'course_id', 'price'];
}
