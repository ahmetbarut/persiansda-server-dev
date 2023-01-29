<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;

class HopeCollection extends ResourceCollection
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return $this->collection->map(function ($hope) {
            $video = Storage::URL(json_decode($hope->video, true)[0]['download_link']);
            $getID3 = new \getID3;
            $duration = $getID3->analyze(substr($video, 1))['playtime_seconds'];
            return [
                'name' => $hope->name,
                'slug' => $hope->slug,
                'thumbnail' => asset(Storage::URL(str_replace('\\', '/', $hope->thumbnail))),
                'description' => $hope->description ? $hope->description : '',
                'video' => asset($video),
                'duration' => $duration,
                'youtube' => $hope->youtube ? $hope->youtube : '',
            ];
        });
    }
}
