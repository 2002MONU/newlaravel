<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWarranty extends Model
{
    use HasFactory;
    protected $fillable = [
        'warranty_summry','warranty_service_type',
        'warranty_covered','warranty_not_covered','warranty_domestic','category_id'
    ];
}
