<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth:admin")->group(function()
{
    
    Route::resource("/posts", PostController::class);
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

});

Route::middleware("guest:admin")->group(function()
{
    Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");
    Route::post("/login_proccess", [AuthController::class, "login"])->name("login_proccess");
});




