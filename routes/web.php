<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;


Route::get("/", [PeopleController::class, "index"]);


//Admin routes
Route::group(["middleware" => ["is_admin", "auth"], "prefix" => "admin"], function () {
    Route::get("/", [PeopleController::class, "index"]);

    Route::get("/users/{user}/people", [AdminController::class, "manage"]);
    Route::get("/users/registered", [AdminController::class, "users"]);

    Route::get("/users/{user}/edit", [AdminController::class, "edit"]);
    Route::patch("/users/{user}/edit", [AdminController::class, "update"]);

    Route::delete("/users/{user}", [AdminController::class, "destroy"]);

});


//People Routes
Route::group(["middleware" => "auth"], function () {

    Route::prefix("/people")->group(function () {
        //Manage
        Route::get("/manage", [PeopleController::class, "manage"]);

        //Create
        Route::view("/create", "people.create");
        Route::post("/create", [PeopleController::class, "store"]);

        //Edit
        Route::get("/{person}/edit", [PeopleController::class, "edit"]);
        Route::patch("/{person}/edit", [PeopleController::class, "update"]);

        //Delete
        Route::delete("/{person}", [PeopleController::class, "destroy"]);
    });


    //Logout
    Route::post("/logout", [AuthController::class, "logout"]);
});;


Route::group(["middleware" => "guest"], function () {

    //Register
    Route::view("/register", "auth.register");
    Route::post("/register", [AuthController::class, "register"]);

//Login
    Route::view("/login", "auth.login")->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login");

});
