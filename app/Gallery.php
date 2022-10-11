<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Gallery extends Model
{
    use Notifiable;

    protected $table = 'gallerys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_id','image_title','short_description','url_slug', 'disp_order','thump_image','image1','thump_alt','image1_alt','status'
    ];

    public function categories()
    {
        return $this->belongsTo('App\GlyCatg','catg_id','id');
    }


}
