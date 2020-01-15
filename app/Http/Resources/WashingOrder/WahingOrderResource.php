<?php

namespace App\Http\Resources\WashingOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class WahingOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
