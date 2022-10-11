<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    use Notifiable;

    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_id','sub_catg_id','service_code','service_name','description', 'keywords','url_slug', 'disp_order','thump_image','image1','image2','image3','image4','image5','status'
    ];

    public function categories()
    {
        return $this->belongsTo('App\SerCatg','catg_id','id');
    }

    public function sub_categories()
    {
        return $this->belongsTo('App\SerSubCatg','sub_catg_id','id');
    }

}
