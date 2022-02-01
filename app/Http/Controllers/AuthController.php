<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(LoginFormRequest $request)
    {

        if(auth("web")->attempt($request->validated()))
        {
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors(["password" => "Incorrect password!"])->withInput();
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("home"));
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function register(AuthFormRequest $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);
        auth("web")->login($user);

        return redirect(route("home"));
    }

    public function showForgotForm()
    {
        return view()
    }
}
