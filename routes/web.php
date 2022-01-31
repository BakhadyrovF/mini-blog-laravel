<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [PostController::class, "showHomeForm"])->name("home");
Route::get("/posts", [PostController::class, "showPostsForm"])->name("posts");
Route::get("/posts/{id}", [PostController::class, "showPostForm"])->name("posts_id");


