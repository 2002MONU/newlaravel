<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_name','description','location','type','job_title','priority','status',
    ];
}
