<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_name','product_title','team_title','footer_title','ethical_title','otc_title'	,'reach_out_image','header_logo','footer_logo','favicon','company_background','product_background',	'export_background','career_background','contact_background','achieve_back',
    ];
}
