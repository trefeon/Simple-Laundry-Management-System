<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'service_type',
        'weight',
        'price',
        'status',
        'pickup_date',
        'delivery_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}