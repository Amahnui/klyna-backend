<?php

namespace App\Http\Resources\QuoteRequest;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuoteRequestCollection extends ResourceCollection
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
