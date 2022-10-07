<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class PeopleController extends Controller
{
    public function index()
    {
        $people = People::all();
        return view( "people.index", compact("people"));
    }

    public function store(StoreRequest $request)
    {
        $fields = $request->validated();
        $fields["user_id"] = auth()->id();
        People::create($fields);
        return redirect("/")->with("message", "Added successfully");
    }

    public function edit(People $person)
    {
        return view("people.edit", compact("person"));
    }

    public function update(People $person, StoreRequest $request)
    {
        $person->update($request->validated());
        return redirect("/")->with("message", "Updated");
    }

    public function destroy(People $person)
    {
        $person->delete();
        return redirect("/");
    }

    public function manage()
    {
        $people = auth()->user()->people()->get();
        return view("people.manage", compact("people"));
    }
}
