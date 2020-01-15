<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicePricingResource extends JsonResource
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
            'service' => $this->service,
            'category' => $this->category,
            'startPrice' => $this->start_price,
            'salePrice' => $this->sale_price,
            'startSale' => $this->start_sale,
            'endSale' => $this->end_sale,
        ];
    }
}
