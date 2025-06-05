<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GenreResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'books' => BookResource::collection($this->whenLoaded('books')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}