<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Questionpaperdownload extends Model
{
    use Notifiable;

    protected $table = 'question_paper_downloads';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'q_id','qd_name', 'qd_email', 'qd_phone','message','status'
    ];
    public function questionpapers()
    {
        return $this->belongsTo('App\Questionpaper','q_id','id');
    }
}
