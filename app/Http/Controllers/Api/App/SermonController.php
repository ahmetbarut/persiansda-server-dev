<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Resources\SermonCollection;
use App\Http\Resources\SermonResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sermon;

class SermonController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->limit ?? 6;

        $sermon = Sermon::where('status', true)->simplePaginate($limit);
        return new SermonCollection($sermon);
    }

    public function show(Sermon $sermon)
    {
        return new SermonResource($sermon);
    }
}
