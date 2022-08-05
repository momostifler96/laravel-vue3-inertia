<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        return Inertia::render("Home");
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
