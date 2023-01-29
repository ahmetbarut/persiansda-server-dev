<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Not Found.',
    ], 404);
});
