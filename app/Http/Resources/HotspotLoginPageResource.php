<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotspotLoginPageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'company' => $this->company,
            'title' => $this->title,
            'description' => $this->description,
            'logo' => $this->logoUrl(),
            'background' => $this->backgroundUrl(),
            'fontColor' => $this->fontColor,
            'primaryColor' => $this->primaryColor,
            'secondaryColor' => $this->secondaryColor,
            'font' => $this->font,
            'opacity' => $this->opacity,
            'form' => new HotspotLoginFormResource($this->form),
            'serviceLocation' => $this->serviceLocation->only('id','uuid'),
            'createdAt' => $this->created_at->format('d/m/Y H:i'),
            'updatedAt' => $this->updated_at->format('d/m/Y H:i'),
        ];
    }
}
