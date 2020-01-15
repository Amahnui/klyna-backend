<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnershipResource extends JsonResource
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
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'phone_number' => $this->phone_number,
            'email' =>$this->email,
            'city' => $this->city,
            'region' => $this->region,
            'partnershipIdea' => $this->partnership_idea
        ];
    }
}
