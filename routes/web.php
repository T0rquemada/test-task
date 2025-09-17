<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::post('/search', [SearchController::class, "search"]);
