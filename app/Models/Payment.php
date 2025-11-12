<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- السطر المضاف

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'transaction_id', 'payment_method', 'amount', 'status'];
}