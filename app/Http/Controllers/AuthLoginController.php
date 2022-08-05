<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class AuthLoginController extends Controller
{
    public function __invoke()
    {
        return Inertia::render("auth/register");
        
    }
    public function store(Request $request)
    {   
        try {
            $data = $request->validate([
                "username"=>["required","min:8","max:20"],
                "password"=>["required","min:8"],
                "email"=>["required","min:8","email"],
                "phone"=>["required","min:8","max:15"],
            ]);
            

            if(User::where("email",$data['email'])->first()){
                session()->flash("error","Erreur lors de votre inscription ce email n'est pas disponible veillez le changer");
                return back();
            }
            elseif(User::where("username",$data['username'])->first()){
                session()->flash("error","Erreur lors de votre inscription ce mom d'utlisateur n'est pas disponible veillez le changer");
                return back();
            }
            elseif(User::where("phone",$data['phone'])->first()){
                session()->flash("error","Erreur lors de votre inscription ce numero de telephone n'est pas disponible veillez le changer");
                return back();
            }
            elseif($user = User::create("username",$data['username'])){
                Auth::attempt($user,true);
                return to_route("home.index");
            }
            else{
                session()->flash("error","Erreur lors de votre inscription veillez verifier vos indentifants");
                return back();
            }

        } catch (\Throwable $th) {
            Log::info('Register error '.$th->getMessage());
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
