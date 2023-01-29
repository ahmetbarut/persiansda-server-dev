<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class HopePlaylistResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'thumbnail' => asset(Storage::URL(str_replace('\\', '/', $this->thumbnail))),
            'hopes' => new HopeCollection($this->hopes),
            'created_at' => $this->created_at,
        ];
    }
}
