<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'service' => $this->service_id,
            'rating' => $this->rating,
            'body' => $this-> body,
            'customer' => $this->user_id,
            'verified' => $this->verified,
            'createdAt' => $this->created_at

        ];
    }
}
