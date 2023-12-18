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
        'order_status',
    ];
    public function payment()
    {
        return $this->hasOne(Payment::class);
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


}
