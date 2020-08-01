<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Album extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'name' => $this->name,
            'artist' => $this->artist,
            'year' => $this->year,
            'genre' => $this->genre,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'imageUri' => "https://proyecto-2-mkloster.herokuapp.com/api/albums/image/".$this->id,
            'resource' => "https://proyecto-2-mkloster.herokuapp.com/api/albums/".$this->id,
        ];
    }
}
