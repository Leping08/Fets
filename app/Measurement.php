<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $fillable = [
        'user_id',
        'calories_burned',
        'calories_eaten',
        'weight',
        'date'
    ];
}
