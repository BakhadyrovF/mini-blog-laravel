@extends("layouts.main")
@section("title", "Register")

@section("content")
<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Sign In</h1>

        <form class="space-y-5 mt-5" action="{{route("admin.login_proccess")}}" method="POST">
            @csrf

            <input name="email" type="text" value="{{old("email")}}" class="w-full h-12 border border-gray-800 @error("email")
                border-red-500
            @enderror rounded px-3" placeholder="Email" />
                @error("email")
                    <p class="text-red-500">{{$message}}</p>
                @enderror

            <input name="password" type="password" class="w-full h-12 border border-gray-800 @error("password")
                border-red-500
            @enderror rounded px-3" placeholder="Password" />
                @error("password")
                    <p class="text-red-500">{{$message}}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Submit</button>
        </form>
    </div>
</div>
@endsection
