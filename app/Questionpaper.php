<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Questionpaper extends Model
{
    use Notifiable;

    protected $table = 'question_papers';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',  'disp_order','file','status'
    ];

    

}
