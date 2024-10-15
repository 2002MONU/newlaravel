<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'address','mobile_no','hotline_no','email','facebook','twitter','google','instagram','behance','map_link',
    ];
}
