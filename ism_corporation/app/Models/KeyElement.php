<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyElement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'document','priority','status',
    ];
}
