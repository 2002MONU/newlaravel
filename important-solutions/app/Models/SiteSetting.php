<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_name','header_logo','footer_logo','favicon','about_banner','service_banner',
        'blog_banner','contact_banner','footer_image','experience_image','footer_about',
    ];
}
