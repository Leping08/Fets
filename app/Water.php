<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    protected $fillable = ['user_id', 'ounces', 'date'];
}
