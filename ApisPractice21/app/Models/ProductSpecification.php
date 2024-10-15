<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $fillable = [
       'brand','catogory_id','model_number','lens_type','color','compatible',
    ];
}
