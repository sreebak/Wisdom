<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    use Notifiable;

    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_id','project_code','project_name','client_name','project_date1','project_date2','short_description','long_description', 'project_value','keywords', 'url_slug', 'disp_order','thump_image','image1','image2','image3','image4','image5','thump_alt','image1_alt','image2_alt','image3_alt','image4_alt','image5_alt','status'
    ];

    public function categories()
    {
        return $this->belongsTo('App\PjxCatg','catg_id','id');
    }


}
