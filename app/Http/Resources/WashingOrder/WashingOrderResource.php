<?php

namespace App\Http\Resources\WashingOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class WashingOrderResource extends JsonResource
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
           'order_number' => $this->order_number,
            'customer' => $this->customer,
            'coupon' => $this->coupon,
            'shipping_address' => $this->shipping_address,
            'payment_status' => $this->payment_status,
            'payment_method' => $this->payment_status,
            'paid_amount' => $this->paid_amount,
            'paid_date' => $this->paid_date,
            'date_completed' => $this->date_completed,
            'items'

        ];
    }
}
