<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Blog extends Model
{
    use Notifiable;

    protected $table = 'blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_id','blog_title','blog_date','short_description','blog_content','keywords', 'url_slug', 'disp_order','thump_image','image1','image2','image3','image4','image5','thump_alt','image1_alt','image2_alt','image3_alt','image4_alt','image5_alt','status'
    ];

    public function categories()
    {
        return $this->belongsTo('App\BlgCatg','catg_id','id');
    }


}
