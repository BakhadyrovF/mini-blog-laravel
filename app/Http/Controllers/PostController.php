<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormMail;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    public function comment(CommentFormRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->comment()->create($request->validated());

        return redirect(route("posts_id", $id));
    }

    public function showContactForm()
    {
        return view("contact");
    }

    public function contact(ContactFormRequest $request)
    {
        $data = $request->validated();

        Mail::to("bakhadyrovf@gmail.com")->send(new ContactFormMail($data));

        return redirect(route("home"));



    }
}
