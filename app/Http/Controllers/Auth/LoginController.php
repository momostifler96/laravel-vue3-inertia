<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function __invoke()
    {
        return Inertia::render("auth/Login");
        
    }
    public function store(Request $request)
    {   

        try {
            //dd($request["password"]);
            $data = $request->validate([
                "uuid"=>["required","min:6","max:20"],
                "password"=>["required","min:8"],
            ]);

            $user = User::where("username",$request['uuid'])->first();            
            if($user && Hash::check($data["password"],$user->password)){
                Auth::login($user);
                return to_route("home.index");
            }
            else{
                Session::flash("error","Erreur lors de votre connexion veillez verifier vos indentifants");
                return to_route("login");

            }


        } catch (\Throwable $th) {
            
            Session::flash("error","Erreur lors de votre connexion veillez verifier vos indentifants");
            Log::info('Login error '.$th->getMessage());
            return back();
        }
        
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route("home.index");
    }
}
