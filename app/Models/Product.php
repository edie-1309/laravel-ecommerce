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



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
