<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'price' => $this->price,
            'type' => $this -> price,
            'discountType' => $this->discount_type,
            'expiration_date' => $this->expiration_date->format('d-m-Y'),
            'usageCount' => $this->usage_count,
            'individualUse' => $this->individual_use,
            'service' => $this->service,
            'usageLimit' => $this->usage_limit,
            'usageLimitPerUser' => $this->usage_limit_per_user,
            'minimumUsageAmount' => $this->minimum_limit,
            'maximumUsageAmount' => $this->maximum_limit,
        ];
    }
}
