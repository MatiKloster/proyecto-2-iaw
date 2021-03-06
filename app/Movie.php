<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable=['name','director','cover','year','genre','quantity','price'];

    public function users(){

        return $this->belongsToMany(User::class)->withTimestamps();
    
    }
    
    public function delete()
    {
        $this->users()->detach();

        return parent::delete();
    }
}
