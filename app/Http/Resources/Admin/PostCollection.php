<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseCollection;
use Illuminate\Http\Request;

class PostCollection extends BaseCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
