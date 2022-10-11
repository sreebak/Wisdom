<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SerSubCatg extends Model
{
    use Notifiable;

    protected $table = 'ser_sub_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_id','sub_catg_name', 'url_slug', 'disp_order','image','status'
    ];

    public function categories()
    {
        return $this->belongsTo('App\SerCatg','catg_id','id');
    }


    public function product() 
    {
        return $this->hasMany('App\Service','sub_catg_id','id');
    }


}
