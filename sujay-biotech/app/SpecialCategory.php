<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialCategory extends Model
{
    protected  $table = "special_category";
    protected  $fillable = [
        'name'
    ];
}
