<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected  $fillable = [
        'user_id',
        'order_id',
        'bank_id',
        'payment_number',
        'amount',
        'status',
        'gateway',

    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


}
