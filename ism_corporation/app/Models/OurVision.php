<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurVision extends Model
{
    use HasFactory;
    protected $fillable = [
        'vision_image','vision_description','object_image','object_description',
    ];
}
