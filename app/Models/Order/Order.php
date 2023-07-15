<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'order_code',
        'grant_total',
        'status',
        'account_bank',
        'snap_token',
        'slug',
    ];
}
