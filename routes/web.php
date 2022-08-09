<?php

use App\Http\Controllers\DashboardController;
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
 
 Route::group(["prefix"=>"article","as"=>"post.","controller"=>PostController::class],function(){
    Route::get("/",PostController::class)->name("index");
    Route::post('/post/newcomment','addComment')->name('comment.new');

    Route::get("/post/{slug}",'show')->name("show");
    Route::middleware(["auth"])->group(function(){
        Route::get("/{slug}/edit",'edit')->name("edit");
    });
});

Route::group(['prefix'=>'mom-compte','as'=>'dashboard.','middleware'=>'auth'],function(){
    Route::get('/',DashboardController::class)->name('index');
    Route::get('/modification-de-profile',[DashboardController::class,'editProfile'])->name('edit-profile');
     Route::group(['prefix'=>'posts','as'=>'post.','controller'=>PostController::class],function(){
        Route::get('/','myPosts')->name('myPosts');
        Route::get('/edit/{slug}','edit')->name('edit');
        Route::post('/edit','update')->name('update');
        Route::get('/nouveau','create')->name('create');
        Route::post('/nouveau','store')->name('store');
       Route::post('/delete','destroy')->name('delete');
    }); 
});
 
/* Route::get('/', function () {
    return view('welcome');
}); */

require __DIR__.'/auth.php';
