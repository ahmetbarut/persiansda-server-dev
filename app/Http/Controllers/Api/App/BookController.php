<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Http\Resources\ChapterResource;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // return ['locale' => $request->header('locale')];
        $limit = $request->limit ?? 6;

        $books = Book::where('status', true)->simplePaginate($limit);
        return new BookCollection($books);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function detail(Book $book, Chapter $chapter)
    {
        return new ChapterResource($chapter);
    }
}
