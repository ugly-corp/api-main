<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\UserResource;
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
            'id', 'title', 'description', 'views_counter', 'user', 'is_published'
        ]);
        return [
            ...$fields,
            'photo' => $this->photo?->getUrl(),
            'categories' => CategoryResource::collection($this->categories),
            'user' => new UserResource($this->user),
        ];
    }
}
