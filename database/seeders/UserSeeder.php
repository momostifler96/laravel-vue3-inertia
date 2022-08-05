<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*   \App\Models\User::factory()->create([
            "username"=>"momoledev",
            "first_name"=>"doumbia",
            "last_name"=>"mohamed",
            "birthday"=>Carbon::createFromDate(1996,04,15),
            "phone"=>"0544554896",
            "email"=>"admin@gbairai.com",
            "password"=>Hash::make("9j&Sm@Ibx#v1pYlQ"),
        ]);  */

        \App\Models\User::factory(30)->create();
        
    }
}
