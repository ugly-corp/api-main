<?php

namespace App\Http\Paginators;

use Illuminate\Pagination\LengthAwarePaginator;

class BasePaginator extends LengthAwarePaginator
{
    public function toArray()
    {
        return [
            'data' => $this->items->toArray(),
            'meta' => [
                'current_page' => $this->currentPage(),
//                'first_page_url' => $this->url(1),
                'from' => $this->firstItem(),
                'last_page' => $this->lastPage(),
//                'last_page_url' => $this->url($this->lastPage()),
//                'links' => $this->linkCollection()->toArray(),
//                'next_page_url' => $this->nextPageUrl(),
//                'path' => $this->path(),
                'per_page' => $this->perPage(),
//                'prev_page_url' => $this->previousPageUrl(),
                'to' => $this->lastItem(),
                'total' => $this->total(),
                'page' => $this->currentPage(),
            ]
        ];
    }
}
