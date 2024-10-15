<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutVision extends Model
{
    use HasFactory;
    protected $fillable =[
         'what_we_do','ourvision','who_we_are','our_team',
    ];
}
