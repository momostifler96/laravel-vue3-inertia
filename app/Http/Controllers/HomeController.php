<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts=Post::take(5)->get();
        return Inertia::render("Home",compact('posts'));
    }
    public function support()
    {
        return Inertia::render("Support");
    }
    public function help()
    {
        return Inertia::render("Help");
    }
}
