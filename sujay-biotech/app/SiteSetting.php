<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    // use HasFactory;
    // Add your fillable properties here
    protected $fillable = [
        'site_title', 'logo', 'favicon', 'ftlogo', 'address', 'email', 'phone',
        'whatsapp', 'instagram', 'facebook', 'linkedin', 'twitter', 'og_title',
        'og_type', 'og_url', 'og_site_name', 'og_image', 'og_width', 'og_height',
        'og_description', 'twitter_card', 'twitter_title', 'twitter_image', 'site_location',
        'site_about'
    ];
}
