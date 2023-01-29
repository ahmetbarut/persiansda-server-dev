<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class HopeResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
