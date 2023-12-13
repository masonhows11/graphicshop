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
        'amount',
        'payment_status',
        'order_status',
    ];
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function transaction(){
        return $this->hasOne(Transaction::class,'order_id');
    }


    /* public function delivery()
   {
       return $this->belongsTo(Delivery::class);
   }*/

}
