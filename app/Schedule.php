<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'name', 'start_datetime', 'end_datetime', 'club_id', 'team_id', 'place', 'memo'
    ]
}
