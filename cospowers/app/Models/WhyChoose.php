<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChoose extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','heading','p1','p2','p3','p4','p5',
    ];
}
