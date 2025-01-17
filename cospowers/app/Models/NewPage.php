<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','description','image','status','priority','post_by',
    ];
}
