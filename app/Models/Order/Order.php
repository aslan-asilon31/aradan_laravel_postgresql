<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'product_id',
        'product_name',
        'payment_status',
        'qty',
        'total_price',
        'snap_token',
    ];
}
