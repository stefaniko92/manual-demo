<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestrictionResource extends JsonResource
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
            'answer_id' => $this->answer_id,
            'subject_type' => $this->subject_type,
            'subject_id' => $this->subject_id,
            'action' => $this->action
        ];
    }
}
