<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $fields = $this->only([
            'id', 'title', 'description', 'views_counter', 'categories', 'user'
        ]);
        return [...$fields, 'photo' => $this->photo?->original_url, 'user' => $this->user->only('id', 'name')];
    }
}
