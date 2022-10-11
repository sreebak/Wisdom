<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Privacypolicy extends Model
{
    use Notifiable;

    protected $table = 'privacypolicy';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'policy'
    ];

}
