<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_form extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name','subject','mobile_no','email','message',
    ];
}
