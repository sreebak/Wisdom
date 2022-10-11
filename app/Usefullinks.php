<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usefullinks extends Model
{
    use Notifiable;

    protected $table = 'useful_links';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link_name', 'link_url', 'disp_order','status'
    ];

   
}
