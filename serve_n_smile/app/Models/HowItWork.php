<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowItWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_online' ,'get_confirmation','let_enjoy',
    ];
}
