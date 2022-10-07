<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Http\Requests\StoreRequest;

class ListController extends Controller
{
    public function index()
    {
        $lists = Information::all();
        return view("list.index", compact("lists"));
    }

    public function store(StoreRequest $request)
    {
     $fields =$request->validated();
     $fields["user_id"] = auth()->id();
         
        Information::create($fields);
        return redirect("/")->with("message", "Added successfully");
    }

    public function edit(Information $list)
    {
        return view("list.edit", compact("list"));

    }

    public function update(Information $list,StoreRequest $request)
    {
      $list->update($request->Validated());
      return redirect("/");
    }

    public function destroy(Information $list) {
        $list->delete();
        return redirect("/");
    }

    public function manage() {
        $lists = auth()->user()->information()->get();
        return view("list.manage",compact("lists"));
    }

}
