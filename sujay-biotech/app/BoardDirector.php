<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardDirector extends Model
{
    protected $table = "board_directors";

    protected $fillable = [
       'name','designation','image','status','priority',
    ];
}
