<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ganteng.com',
            'email_verified_at' => now(),
            'password' => 'admin123',
            'role' => 'admin',
            'status' => 'active',
        ]);
    }
}
