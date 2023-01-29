<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;

class HopePlaylistCollection extends ResourceCollection
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return $this->collection->map(function ($playlist) {
            return [
                // 'id' => $playlist->id,
                'name' => $playlist->name,
                'slug' => $playlist->slug,
                'thumbnail' => asset(Storage::URL(str_replace('\\', '/', $playlist->thumbnail))),
                'description' => $playlist->description,
                'intro' => $playlist->hopes[0] ? asset(Storage::URL(json_decode($playlist->hopes[0]->video, true)[0]['download_link'])) : '',
                'featured' => $playlist->featured ? true : false,
            ];
        });
    }
}
