<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    public function courses(){
        return $this->hasMany('App\Product','tutor_id','id');
    }
}
