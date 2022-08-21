<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function update(Request $request)
    {   
        try {

            DB::beginTransaction();
                $user = $request->user()->update($request->only([
                    "last_name",
                    "first_name",
                    "username",
                    "phone",
                ])  );
            DB::commit();
            session()->flash('success',"Votre profile a bien ete mis ajour");
            return to_route("dashboard.index");
        } catch (\Throwable $th) {
            Log::info('error update profile : '.$th->getMessage());
            DB::rollBack();
            session()->flash('error',"Erreur lors de la mis a jour de votre profile");
            return back();
        }
       


    }
}
