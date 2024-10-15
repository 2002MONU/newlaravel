<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abouts extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','description','experince_image','experince','service_image','service',
    ];
}
