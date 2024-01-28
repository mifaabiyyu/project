<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('password'),
            'photo'     => '',
            'status'    => 1

        ]); 

        $user->assignRole('');
    }
}
