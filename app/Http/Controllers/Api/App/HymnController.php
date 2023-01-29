<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Controllers\Controller;
use App\Http\Resources\HymnCollection;
use App\Models\Hymn;
use Illuminate\Http\Request;

class HymnController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->limit ?? 8;
        
        $hymns = Hymn::where('status', true)->orderBy('order', 'asc')->simplePaginate($limit);
        return new HymnCollection($hymns);
    }
}
