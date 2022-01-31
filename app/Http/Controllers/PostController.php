<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function showHomeForm()
    {
        $posts = Post::orderBy("created_at", "DESC")->limit(3)->get();

        return view("welcome", [
            "posts" => $posts
        ]);
    }

    public function showPostsForm()
    {
        $posts = Post::orderBy("created_at", "DESC")->paginate(3);

        return view("posts.index", [
            "posts" => $posts
        ]);
    }

    public function showPostForm($id)
    {
        $post = Post::findOrFail($id);

        return view("posts.show", [
            "post" => $post
        ]);
    }
}
