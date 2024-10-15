<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = "packages";
    protected $fillable = [
        'package_name','status'
    ];

    public function package_details()
{
    return $this->hasMany(PackageDetail::class, 'package_id');
}

}
