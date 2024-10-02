<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);

        // Create an admin user and assign the 'admin' role
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'testadmin@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole($adminRole);

        // Create a customer user and assign the 'customer' role
        $customerUser = User::factory()->create([
            'name' => 'Customer User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        $customerUser->assignRole($customerRole);
    }
}
