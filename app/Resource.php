<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function course(){
        return $this->belongsTo('App\Product','course_id','id');
    }
}
