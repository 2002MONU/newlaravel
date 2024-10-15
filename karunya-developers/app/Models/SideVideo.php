<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideVideo extends Model
{
    use HasFactory;
protected  $table = "side_videos";
protected  $fillable = [
    'video'
];
}
