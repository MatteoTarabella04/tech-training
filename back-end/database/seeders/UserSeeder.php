<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = config("users");

        foreach ($users as $users) {
            $newUser = new User;
            $newUser->name = $users["name"];
            $newUser->last_name = $users["last_name"];
            $newUser->email = $users["email"];
            $newUser->password = Hash::make($users["password"]);
            $newUser->save();
        }
    }
}
