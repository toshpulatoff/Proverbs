<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Check if the "administrator" role already exists
        $administratorRole = Role::where('name', 'administrator')->first();

        // If the role doesn't exist, create it
        if (!$administratorRole) {
            Role::create([
                'name' => 'administrator',
                // You can add any other fields you have in the roles table
            ]);
        }
    }
}
