<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    use HasFactory;
    protected  $table = "meta_tags";
    protected $fillable = [
        'og_description','og_image','og_site_name','og_title','og_url','og_type','twitter_card',	'twitter_type',	'twitter_site','twitter_creator','twitter_title','twitter_description','twitter_image',
    ];
}
