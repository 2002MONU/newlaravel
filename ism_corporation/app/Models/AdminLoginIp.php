<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLoginIp extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_email','ip_address',
    ];
}