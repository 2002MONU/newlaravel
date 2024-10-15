<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ethical extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','image','icon','description','priority','status','back_image',
    ];
}
