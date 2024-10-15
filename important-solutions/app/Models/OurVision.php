<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurVision extends Model
{
    use HasFactory;
    protected $fillable = [
        'our_vision','our_mission','vision_icon','mission_icon',
    ];
}
