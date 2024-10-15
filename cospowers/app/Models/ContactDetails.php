<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'email','address','mobile_no','whattsapp','call_no','map_link',
    ];
}
