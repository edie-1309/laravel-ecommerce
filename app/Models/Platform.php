<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $table = 'platform';

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_platform')->withTimestamps();
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
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
