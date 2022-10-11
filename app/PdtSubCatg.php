<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PdtSubCatg extends Model
{
    use Notifiable;

    protected $table = 'pdt_sub_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_id','sub_catg_name', 'url_slug', 'disp_order','image','short_description','long_description','status'
    ];

    public function categories()
    {
        return $this->belongsTo('App\PdtCatg','catg_id','id');
    }


    public function product() 
    {
        return $this->hasMany('App\Product','sub_catg_id','id');
    }


}
