<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::where('email', 'admin@gmail.com')->first();

        if (is_null($user)) {
            $user           = new User();
            $user->name     = "Super Admin";
            $user->email    = "admin@gmail.com";
            $user->password = Hash::make('4dm1nL0g!n');
            $user->save();
        }
    }
}
