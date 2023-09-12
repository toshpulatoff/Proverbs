<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create an admin role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'administrator']);

        // Create an admin user
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456!!'), // Hashed password
        ]);

        // Attach the admin role to the admin user
        $adminUser->roles()->attach($adminRole);
    }
}
