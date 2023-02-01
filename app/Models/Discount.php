<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'discount';

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
