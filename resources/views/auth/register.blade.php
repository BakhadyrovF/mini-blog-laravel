@extends("layouts.main")
@section("title", "Register")

@section("content")
<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Регистрация</h1>

        <form class="space-y-5 mt-5" action="{{route("register_proccess")}}" method="POST">
            @csrf

            <input name="name" type="text" value="{{old("name")}}" class="w-full h-12 border border-gray-800 @error("name")
                border-red-500
            @enderror  rounded px-3" placeholder="Name" />
                @error("name")
                    <p class="text-red-500">{{$message}}</p>
                @enderror

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


            <input name="password_confirmation" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Подтверждение пароля" />

            <div>
                <a href="{{route("login")}}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Sign In</a>
            </div>

            <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Зарегистрироваться</button>
        </form>
    </div>
</div>
@endsection
