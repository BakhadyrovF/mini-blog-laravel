<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showHomeForm()
    {
        $posts = Post::orderBy("created_at", "DESC")->limit(3);

        return view("welcome", [
            "posts" => $posts
        ]);
    }

    public function showPostsForm()
    {
        return view("posts.index");
    }
}
