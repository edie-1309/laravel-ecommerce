<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = [
    //     'name',
    //     'slug',
    //     'description',
    //     'price', 
    //     'image',
    //     'category_id'
    // ];

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function platform()
    {
        return $this->belongsToMany(Platform::class);
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
