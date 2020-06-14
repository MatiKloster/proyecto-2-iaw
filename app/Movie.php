<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable=['name','director','cover','year','genre','quantity','price'];

}
