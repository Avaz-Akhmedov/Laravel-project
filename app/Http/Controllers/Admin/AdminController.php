<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SimpleRequest;
use App\Models\People;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $people = People::all();
        return view( "admin.index", compact("people"));
    }

    public function users() {
        $users = User::all();
        return view("admin.users.users",compact("users"));
    }
    public  function edit(User $user) {
        return view("admin.users.edit",compact("user"));
    }

    public function update(User $user,Request $request){

        $user->update($request->validate([
            "name" => "required",
            "email" => ["required","email"]
        ]));
        return redirect("/admin/users");
    }

    public function destroy(User $user){
        if (auth()->user()->is_admin == 1) {
            return back();
        }

        $user->delete();
        return redirect("/admin/users");
    }

    public function manage(User $user) {

        $people = $user->people()->get();
        return view("admin.users.manage",compact("people"));
    }
}
