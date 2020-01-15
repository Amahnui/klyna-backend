<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'type' => $this->type,
            'description' => $this->description,
            'cover_photo' => $this->cover_photo,
            'background_photo' => $this->background_photo,
            'price' => $this->price,

        ];
    }
}
