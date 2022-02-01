<?php


use App\Http\Controllers\AuthController;
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

Route::middleware("auth:web")->group(function()
{
    Route::post("/posts/comment/{id}", [PostController::class, "comment"])->name("comment");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
});


Route::get("/", [PostController::class, "showHomeForm"])->name("home");
Route::get("/posts", [PostController::class, "showPostsForm"])->name("posts");
Route::get("/posts/{id}", [PostController::class, "showPostForm"])->name("posts_id");
Route::get("/contact", [PostController::class, "showContactForm"])->name("contact");
Route::post("/contact_proccess", [PostController::class, "contact"])->name("contact_proccess");



Route::middleware("guest:web")->group(function()
{
    Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");
    Route::post("/login_proccess", [AuthController::class, "login"])->name("login_proccess");

    Route::get("/forgot", [AuthController::class, "showForgotForm"])->name("forgot");
    Route::post("/forgot_proccess", [AuthController::class, "forgot"])->name("forgot_proccess");

    Route::get("/register", [AuthController::class, "showRegisterForm"])->name("register");
    Route::post("/register_proccess", [AuthController::class, "register"])->name("register_proccess");
});






