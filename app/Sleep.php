<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sleep extends Model
{
    protected $fillable = ['user_id', 'hours', 'date'];
}
