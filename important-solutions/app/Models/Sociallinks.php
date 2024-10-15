<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sociallinks extends Model
{
    use HasFactory;
    protected $fillable = [
       'facebook','twitter','linked','whatapps','call_us',
    ];
}
