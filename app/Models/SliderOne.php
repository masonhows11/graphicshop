<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderOne extends Model
{

    use HasFactory;
    protected $table = 'slider_one';
    protected $fillable = [
        'category_id',
        'category_name',
        'description'
    ];
}
