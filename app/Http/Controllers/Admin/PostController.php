<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditFormRequest;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "DESC")->paginate(5);

        return view("admin.posts.index", [
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $imageName = time() . "." . $request->image->extension();
        $request->image->storeAs("public/posts", $imageName);
        $data["image"] = $imageName;

        Post::create($data);

        return redirect(route("admin.posts.index"));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view("admin.posts.edit", [
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFormRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->validated();


        if($request->has("image"))
        {
            $imageName = time() . "." . $request->image->extension();
            $request->image->storeAs("public/posts", $imageName);
            $data["image"] = $imageName;
            Storage::delete("public\posts/$post->image");
            $post->update($data);
            return redirect(route("admin.posts.index"));
        }

        $data["image"] = $post->image;
        $post->update($data);
        return redirect(route("admin.posts.index"));



    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete($id);
        Storage::delete("public/posts/$post->image");

        return redirect(route("admin.posts.index"));
    }
}
