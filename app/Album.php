<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable=['name','artist','cover','year','genre','quantity','price'];
}
