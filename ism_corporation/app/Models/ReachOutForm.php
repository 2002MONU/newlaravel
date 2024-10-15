<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReachOutForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','last_name','mobile_no','email','resume','role','message',
    ];
}
