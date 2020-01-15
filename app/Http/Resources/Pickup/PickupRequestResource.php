<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PickupRequestResource extends JsonResource
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
            'user' =>  $this->user_id,
            'attendedTo' => $this->attended_to,
            'agentId' => $this->agent_id,
            'RequestDate' => $this-> created_at
        ];
    }
}
