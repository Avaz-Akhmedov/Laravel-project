<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SimpleRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $fields = $request->validated();
        $fields["password"] = bcrypt($fields["password"]);

        $user = User::create($fields);

        Auth::login($user);

        return redirect("/")->with("message", "Registered");

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect("/");
    }

    public function login(SimpleRequest $request,)
    {
        if (!Auth::attempt($request->validated())) {
            return redirect()->back()
                ->withInput()
                ->withErrors(["password" => "Wrong password"],);

        }

        if (auth()->user()->is_admin == 1) {
            return redirect("/admin");
        }

        return redirect("/");
    }
}
