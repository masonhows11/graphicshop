<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'user_id',
        'order_number',
        'address_id',
        'payment_id',
        'delivery_id',
        'coupon_id',
        'common_discount_id',

        'order_final_amount',
        'order_discount_amount',
        'order_coupon_discount_amount',
        'order_common_discount_amount',
        'order_total_products_discount_amount',
        'delivery_amount',

        'delivery_date',
        'payment_type',

        'payment_status',
        'order_status',
        'delivery_status',
    ];


    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }




    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class,'order_id');
    }


}
