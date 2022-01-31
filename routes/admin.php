<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

// Route::middleware("auth:admin")->group(function()
// {
    Route::resource("/posts", PostController::class);

// });

// Route::middleware("guest:admin")->group(function()
// {
    // Route::get("/register", [Au])
// });




