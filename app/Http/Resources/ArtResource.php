<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'title' => $this->title,
            'artist' => $this->artist,
            'category' => $this->category,
            'description' => $this->description,
            'likes' => $this->likes,
            'gallery_id' => $this->gallery->id,
            'gallery_name' => $this->gallery->name,
            'gallery_address' => $this->gallery->address,


        ];
    }
}