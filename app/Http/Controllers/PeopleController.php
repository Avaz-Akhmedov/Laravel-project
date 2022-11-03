<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Http\Requests\StoreRequest;

class PeopleController extends Controller
{
    // List of all People
    public function index()
    {
        $people = People::all();
        return view("people.index", compact("people"));
    }

    //Create Person
    public function store(StoreRequest $request)
    {
        $fields = $request->validated();
        $fields["user_id"] = auth()->id();
        People::create($fields);
        return redirect("/");
    }

    //Edit Person View
    public function edit(People $person)
    {
        return view("people.edit", compact("person"));
    }

    // Update Person People
    public function update(People $person, StoreRequest $request)
    {
        $person->update($request->validated());
        return redirect("/");
    }

    // Delete Person
    public function destroy(People $person)
    {
        $person->delete();
        return redirect("/");
    }


    // Manage People
    public function manage()
    {
        $people = auth()->user()->people()->get();
        return view("people.manage", compact("people"));
    }
}
