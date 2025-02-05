<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return \Illuminate\Support\Collection
     */
    public function toArray(Request $request): \Illuminate\Support\Collection
    {
        return $this->collection;
    }

    /**
     * Customize the pagination information for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array $paginated
     * @param  array $default
     * @return array
     */
    public function paginationInformation($request, $paginated, $default): array
    {
        unset($default['links']);
        $default['meta'] = $default['meta']['meta']; //@FIXME Посмотреть как избавиться от meta ключа

        return $default;
    }
}
