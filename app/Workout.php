<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = ['user_id', 'calories', 'date'];
}
