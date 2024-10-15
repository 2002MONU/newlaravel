<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Together extends Model
{
    use HasFactory;
    protected $fillable = [
    'title','image','description','home_image',
    ];
}
