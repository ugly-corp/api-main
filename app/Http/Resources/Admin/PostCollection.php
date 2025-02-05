<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseCollection;
use Illuminate\Http\Request;

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
