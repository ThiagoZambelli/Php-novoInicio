<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', 'index');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::post('/series/salvar', 'store');
    Route::delete('/series/destroy/{id}', 'destroy');
});
