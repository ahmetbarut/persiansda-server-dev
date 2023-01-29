<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Controllers\Controller;
use App\Http\Resources\HopeCollection;
use App\Http\Resources\HopePlaylistCollection;
use App\Http\Resources\HopePlaylistResource;
use App\Http\Resources\HopeResource;
use App\Models\HopePlaylist;
use Illuminate\Http\Request;

class HopeController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->limit ?? 6;

        $hope = HopePlaylist::where('status', true)->simplePaginate($limit);
        return new HopePlaylistCollection($hope);
    }

    public function show(HopePlaylist $playlist)
    {
        return new HopeCollection($playlist->hopes);
        // return new HopePlaylistResource($playlist);
    }
}
