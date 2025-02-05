<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'posts' => new PostCollection($this->whenLoaded('posts')),
            'photo' => $this->getFirstMedia()->getUrl(),
            'posts_count' => $this->whenCounted('posts')
        ];
    }
}
