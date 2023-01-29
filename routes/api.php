<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->namespace('Api')->group(function () {
    Route::prefix('/app')->namespace('App')->group(function () {

        // Route::prefix('/{locale}')->group(function () {

            Route::get('/books', 'BookController@index')->name('book.index');
            Route::get('/books/{book}', 'BookController@show')->name('book.show');
            Route::get('/books/{book}/{chapter}', 'BookController@detail')->name('book.detail');

            Route::get('/hopes', 'HopeController@index')->name('hope.index');
            Route::get('/hopes/{playlist}', 'HopeController@show')->name('hope.show');

            Route::get('/hymns', 'HymnController@index')->name('hymn.index');

            Route::get('/sermons', 'SermonController@index')->name('sermon.index');
            Route::get('/sermons/{playlist}', 'SermonController@show')->name('sermon.show');
        });
    // });
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Not Found.',
    ], 404);
});
