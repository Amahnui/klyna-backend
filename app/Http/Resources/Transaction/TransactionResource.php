<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'customer' =>  $this->customer_id,
            'order' => $this->order_id,
            'price' => $this->price,
            'type'  => $this->type,
            'date' => $this->created_at->format('d-m-Y'),
        ];
    }
}
