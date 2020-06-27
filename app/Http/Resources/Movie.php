<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
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
            'director' => $this->director,
            'year' => $this->year,
            'genre' => $this->genre,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];
    }
}
