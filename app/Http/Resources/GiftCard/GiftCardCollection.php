<?php

namespace App\Http\Resources\GiftCard;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GiftCardCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
