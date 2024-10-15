<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvisoryDirector extends Model
{
   protected $table = "advisory_directors";

   protected $fillable = [
      'name','designation','image','status','priority',
   ];
}
