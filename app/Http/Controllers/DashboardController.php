<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('dashboard/index');
    }
    public function editProfile()
    {
        return Inertia::render('dashboard/EditProfile');
    }
}
