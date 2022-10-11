<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_id','sub_catg_id','product_code','product_name','keywords','description', 'url_slug', 'disp_order','thump_image','image1','image2','image3','image4','image5','status'
    ];

    public function categories()
    {
        return $this->belongsTo('App\PdtCatg','catg_id','id');
    }

    public function sub_categories()
    {
        return $this->belongsTo('App\PdtSubCatg','sub_catg_id','id');
    }

    public function getStartDateAttribute($value){
        return date('d-m-Y',strtotime($value));
    }

    public function topics(){
        return $this->hasMany('App\Topic','course_id','id')->where('status',1);
    }

    public function tutor(){
        return $this->hasOne('App\Tutor','id','tutor_id')->where('status',1);
    }

}
