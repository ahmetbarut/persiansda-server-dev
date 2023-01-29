<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;

class HymnCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($book) {
            return [
                'id' => $book->id,
                'singer' => $book->singer->name,
                'name' => $book->name,
                // 'slug' => $book->slug,
                'thumbnail' => asset(Storage::URL(str_replace('\\', '/', $book->thumbnail))),
                'mp3' => asset(Storage::URL(json_decode($book->mp3, true)[0]['download_link'])),
                // 'body' => $book->body ? $book->body : '',
                'body' => $book->body ? str_replace(array("\r"), '', $book->body) : '',
                'category' => $book->category->name,
            ];
        });
    }
}
