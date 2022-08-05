<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
/**
 * Gestion des routes d'authentification
 * 
 */
Route::middleware("guest")->group(function(){
    //Login routes
    Route::get("/connexion",LoginController::class)->name("login");
    Route::post("/connexion",[LoginController::class,"store"])->name("login.store");

    //Register routes
    Route::get("/inscription",RegisterController::class)->name("register");
    Route::post("/inscription",RegisterController::class)->name("register.store");
});
