<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderThree extends Model
{

    use HasFactory;
    protected $table = 'slider_three';
    protected $fillable = [
        'category_id',
        'category_name',
        'description'
    ];
}
