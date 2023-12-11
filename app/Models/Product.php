<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Nagy\LaravelRating\Traits\Rateable;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasPersianSlug, SoftDeletes ,Rateable;

    protected $table = 'products';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'published_at',
        'description',
        'thumbnail_path',
        'demo_url',
        'source_url',
        'status',
        'price',
    ];


    public function getSlugOptions()
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    // for many to many with categories table
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    // relation with productImage table / model
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    // relation with comments table / model
    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()
                ->where('id', 'like', '%' . $search . '%')
                ->orWhere('title_persian', 'like', '%' . $search . '%')
                ->orWhere('title_english', 'like', '%' . $search . '%');
    }

    // one product belongs to many  users
    public function user()
    {
        return $this->belongsToMany(User::class,'product_user');
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }



}
