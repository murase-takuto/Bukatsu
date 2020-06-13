<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'name', 'email', 'tel', 'post_number', 'prefecture_id', 'city_id'
    ];
}
