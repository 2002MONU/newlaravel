<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model
{
    use HasFactory;
    protected $table = 'package_details';
   
    protected $fillable = [
        'package_id','title','description','status',
    ];
    
}
