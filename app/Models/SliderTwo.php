<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderTwo extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'slider_two';
    protected $fillable = [
        'category_id',
        'category_name',
        'description'
    ];
}
