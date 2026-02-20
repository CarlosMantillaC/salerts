<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::firstOrCreate([
            'email' => 'superadmin@example.com',
        ], [
            'name' => 'Superadministrador Demo',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Superadministrador');
    }
}
