<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::group(["controller"=>HomeController::class,"as"=>"home."],function(){
    Route::get("/",HomeController::class)->name("index");
    Route::get("/support","support")->name("support");
    Route::get("/aide","help")->name("help");
    //Route::get("/")->name("index");
});
 
 Route::group(["prefix"=>"article","as"=>"post.","controller",PostController::class],function(){
    Route::get("/",PostController::class)->name("index");
    Route::get("/post/{slug}",[PostController::class,"show"])->name("show");
    Route::middleware(["auth"])->group(function(){
        Route::get("/{slug}/edit",[PostController::class,"edit"])->name("edit");
    });
});
 
/* Route::get('/', function () {
    return view('welcome');
}); */

//require __DIR__.'auth.php';
