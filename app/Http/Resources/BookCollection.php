<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;

class BookCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($book) {
            return [
                'id' => $book->id,
                'name' => $book->name,
                'slug' => $book->slug,
                'thumbnail' => asset(Storage::URL(str_replace('\\', '/', $book->thumbnail))),
                'description' => $book->description,
                'writer' => $book->writer,
                'file' => asset(Storage::URL(json_decode($book->file, true)[0]['download_link'])),
            ];
        });
    }
}
