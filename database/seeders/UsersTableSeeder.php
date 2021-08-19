<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create([
            'first_name'=>'super',
            'last_name'=>'admin',
            'email'=>'superadmin@admin.com',
            'password'=>bcrypt('88888888')
        ]);

        $user->attachRole('super_admin');
    }
}
