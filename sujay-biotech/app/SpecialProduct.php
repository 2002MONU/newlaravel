<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialProduct extends Model
{
    protected  $table = "spercial_product";
    protected  $fillable = [
        'special_cat_id','beadcumb_image','decription','product_name',
    ];
     
}
