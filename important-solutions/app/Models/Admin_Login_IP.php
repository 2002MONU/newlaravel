<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_Login_IP extends Model
{
    use HasFactory;
protected  $table = "admin_login";
protected  $fillable = [
    'admin_id','ip_address',
    ];
}
