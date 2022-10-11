<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Gen extends Model
{
    use Notifiable;

    protected $table = 'gens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'webtitle','description','metatags','google_analy','google_map','keywords','phone1','phone2','email1','email2','website','address','facebook','twitter','linkedin','youtube','google'
    ];

}
