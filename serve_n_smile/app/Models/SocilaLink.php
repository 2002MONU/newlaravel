<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocilaLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'twitter','google_plus','pinerent','snapchat','linkedin','open_time','facebook',
    ];
}
