<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotspotLoginFormResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'google' => $this->google,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'github' => $this->github,
            'forms' => $this->forms,
            'createdAt' => $this->created_at->format('d/m/Y H:i'),
            'updatedAt' => $this->updated_at->format('d/m/Y H:i'),
        ];
    }
}
