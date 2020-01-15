<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftCardResource extends JsonResource
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
            'code' => $this->code,
            'service' => $this->service,
            'price' => $this->price,
            'expirationDate' => $this->expiration_date->format('d-m-Y'),
            'isUsed' => $this->is_used
        ];
    }
}
