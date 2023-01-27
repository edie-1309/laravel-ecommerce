<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $with = ['category', 'stock', 'platform'];

    public function scopeSearchFilter($query, $search)
    {
        return $query->when($search ?? false, function ($query, $test) {
            $query->where('name', 'like', '%' . $test . '%');
        });
    }

    public function scopePlatformFilter($query, $platform)
    {
        return $query->whereHas('platform', function ($query) use ($platform) {
            $query->where('slug', $platform);
        });
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function platform()
    {
        return $this->belongsToMany(Platform::class, 'product_platform')->withTimestamps();
    }

    public function cart()
    {
        return $this->hashMany(Cart::class);
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
