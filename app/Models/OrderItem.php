<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  OrderItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'order_items';
    protected  $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'number',
        'price'
    ];

    public function product(){

        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function singleProduct(){

        return $this->belongsTo(Product::class,'product_id');
    }



}
