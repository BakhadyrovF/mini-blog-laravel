<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthFormRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("admin.auth.login");
    }

    public function login(AuthFormRequest $request)
    {
        $data = $request->validated();

        if(auth("admin")->attempt($data))
        {
            return redirect(route("admin.posts.index"));
        }

        return redirect(route("admin.login"))->withErrors(["password" => "Incorrect Password"])->withInput();
    }

    public function logout()
    {
        auth("admin")->logout();
        return redirect(route("home"));
    }
}
