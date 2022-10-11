<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PjxCatg extends Model
{
    use Notifiable;

    protected $table = 'pjx_categories';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_name', 'url_slug', 'disp_order','image','status'
    ];

    public function project() 
    {
        return $this->hasMany('App\Project','catg_id','id');
    }

}
