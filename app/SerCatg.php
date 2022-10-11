<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SerCatg extends Model
{
    use Notifiable;

    protected $table = 'ser_categories';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_name', 'url_slug', 'disp_order','image','status'
    ];

    public function service() 
    {
        return $this->hasMany('App\Service','catg_id','id');
    }

    public function sub_category() 
    {
        return $this->hasMany('App\SerSubCatg','sub_catg_id','id');
    }
}
