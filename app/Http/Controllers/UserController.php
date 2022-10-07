<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $fields = $request->validated();
        $fields["password"] = bcrypt($fields["password"]);

        $user = User::create($fields);

        Auth::login($user);

        return redirect("/");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect("/");
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if (!Auth::attempt($fields)) {
            return back()->withErrors(["email" => "Invalid Credentials"])->onlyInput("email");
        }

           if (auth()->user()->is_admin) {
               return  redirect("/admin");
           }
        return redirect("/")->with("message", "Logged in successfully");
    }
}
