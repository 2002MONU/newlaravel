<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',	'slug',	'description',	'price'	,'cleaning_hour',	'no_of_cleaner'	,'visiting_hours',	'contact'	,'email',	'service_image_small','	service_image_big'	,'priority',	'status',
    ];
}
