<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteEvaluation extends Model
{
    protected $fillable = [
        'score',
        'comment',
        'url',
        'user_agent',
        'screen_resolution',
        'time_zone',
        'language',
    ];
}
