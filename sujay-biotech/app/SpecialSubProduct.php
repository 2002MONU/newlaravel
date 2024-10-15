<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialSubProduct extends Model
{
    protected  $table = "special_sub_product";
    protected  $fillable = [
        'special_product_id','title','slug','short_description','phone','whatsapps','image','status','priority',
        'soluable_concentrate','features','specification','meta_tite','meta_description','meta_keywords'
    ];
}
