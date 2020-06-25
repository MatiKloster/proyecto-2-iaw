<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name', 'artist', 'cover', 'year', 'genre', 'quantity', 'price'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function delete()
    {
        $this->users()->detach();

        return parent::delete();
    }
}
