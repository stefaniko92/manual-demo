<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'sort_order' => $this->sort_order,
            'behaviours' => BehaviourResource::collection($this->whenLoaded('behaviours')),
            'restrictions' => RestrictionResource::collection($this->whenLoaded('restrictions'))
        ];
    }
}
