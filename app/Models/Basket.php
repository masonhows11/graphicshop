<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basket extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='baskets';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_title',
        'demo_url',
        'price',
        'number'
    ];
}
