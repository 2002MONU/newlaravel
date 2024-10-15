<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    // Define the relationship with the Product model
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
