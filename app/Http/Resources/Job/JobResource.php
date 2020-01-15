<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'position' => $this->position,
            'department' => $this->department,
            'roleSummary' => $this->role_summary,
            'responsibilities' => $this->responsibilities,
            'qualifications' => $this->qualifications,
            'isOpen' => $this->is_open
        ];
    }
}
