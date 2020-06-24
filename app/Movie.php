<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable=['name','director','cover','year','genre','quantity','price'];
    
    protected $path;

    public function users(){

        return $this->belongsToMany(User::class)->withTimestamps();
    
    }
    
    public function getPath(){
        return $this->path;
    }

    public function setPath($path){
        $this->path= $path;
    }
}
