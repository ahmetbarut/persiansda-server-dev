<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'writer' => $this->writer,
            'thumbnail' => asset(Storage::URL(str_replace('\\', '/', $this->thumbnail))),
            'file' => asset(Storage::URL(json_decode($this->file, true)[0]['download_link'])),
            'chapters' => new ChapterCollection($this->chapters),
            'created_at' => $this->created_at,
        ];
    }
}
