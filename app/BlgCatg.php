<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BlgCatg extends Model
{
    use Notifiable;

    protected $table = 'blg_categories';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_name', 'url_slug', 'disp_order','image','status'
    ];

    public function blog() 
    {
        return $this->hasMany('App\Blog','catg_id','id');
    }

}
