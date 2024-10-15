<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        'title',
        'short_description',
        'phone',
        'whatsapp',
        'image',
        'status',
        'category_id',
        'priority',
        'soluable_concentrate',
        'features',
        'specification'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
