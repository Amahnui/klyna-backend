<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactFormResource extends JsonResource
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
            'senderName' => $this->name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'subject' => $this->subject,
            'messsage' => $this->message,
        ];
    }
}
