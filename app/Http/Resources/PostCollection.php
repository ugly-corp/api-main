<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends BaseCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return \Illuminate\Support\Collection
     */
    public function toArray(Request $request): \Illuminate\Support\Collection
    {
        return parent::toArray($request);
    }
}
