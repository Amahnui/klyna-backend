<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'regularPrice' => $this->regular_price,
            'salePrice' => $this->sale_price,
            'startSale' => $this->start_sale->format('d-m-Y'),
            'endSale' => $this->end_sale->format('d-m-Y'),
            'SKU' => $this->SKU,
            'quantity' => $this->quantity,
            'stockThreshold' =>$this->stock_threshold,
            'status' =>($this->quatity) > ($this->stock_threshold) ? 'in stock' : 'out of stock',

        ];
    }
}
