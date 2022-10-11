<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlyCatg extends Model
{
    use Notifiable;

    protected $table = 'gly_categories';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_name', 'url_slug', 'disp_order','image','status'
    ];

    public function gallery() 
    {
        return $this->hasMany('App\Gallery','catg_id','id');
    }

}
