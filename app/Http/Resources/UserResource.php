<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'firstName' => $this->first_name,
            'lastName'  => $this->last_name,
            'email'     => $this->email,
            'phoneNumber' => $this->phone_number,
            'referrer' => $this->referrer_id,
            'companyName' => $this->company_name,
            'address' => $this->address_id,
            'avatar' =>  $this->avatar,
            'primaryLanguage' => $this->primary_language,
            'creditScore' => $this->credit_score,
            'washingCredits' => $this->washing_credits,
            'currentBalance' => $this->current_balance,
            'lastLoginAt' => $this->last_login_at,
            'lastLoginIp' => $this->last_login_ip,
            'lastLoginDevice' => $this->device

        ];
    }
}
