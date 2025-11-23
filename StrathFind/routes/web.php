<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\ClaimController;

Route::resource('claims', ClaimController::class);


Route::resource('lost-items', LostItemController::class);

Route::get('/', function () {
    return view('welcome');
});
