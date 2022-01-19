<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function booted()
    {
        static::creating(function (Product $product) {
            $product->slug = strtolower(Str::slug($product->name . '-' . time()));
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';        # code...
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
