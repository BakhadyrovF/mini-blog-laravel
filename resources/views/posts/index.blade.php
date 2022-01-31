@extends("layouts.main")
@section("title", "Posts")

@section("content")
@include("partials.navbar")

<div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
    @foreach ($posts as $post)

    <div class="px-4 py-8 max-w-xl">
        <div class="bg-white shadow-2xl" >
            <div>
                <a href="{{route("posts_id", $post->id)}}">
                    <img src="https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80">
                </a>
            </div>
            <div class="px-4 py-2 mt-2 bg-white">
                <h2 class="font-bold text-2xl text-gray-800">{{$post->title}}</h2>
                <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                    {{$post->preview}}
                </p>
            </div>
        </div>
    </div>
    @endforeach
    {{$posts->links()}}
</div>
@endsection
