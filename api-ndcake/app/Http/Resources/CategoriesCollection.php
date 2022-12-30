<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriesCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'  => $this->collection,
            'links' => [
                'first'         => $this->url(1),
                'last'          => $this->url($this->lastPage()),
                'prev'          => $this->previousPageUrl(),
                'next'          => $this->nextPageUrl(),
            ],
            'meta'  => [
                'current_page'  => $this->currentPage(),
                'from'          => $this->firstItem(),
                'last_page'     => $this->lastPage(),
                'path'          => $this->getOptions()['path'],
                'per_page'      => $this->perPage(),
                'to'            => $this->lastItem(),
                'total'         => $this->total(),
            ],
        ];
    }
}
