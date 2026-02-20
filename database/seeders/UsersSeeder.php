<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Director Demo',
                'email' => 'director@example.com',
                'password' => bcrypt('password'),
                'role' => 'Director',
            ],
            [
                'name' => 'Docente Demo',
                'email' => 'docente@example.com',
                'password' => bcrypt('password'),
                'role' => 'Docente',
            ],
            [
                'name' => 'Psicologia Demo',
                'email' => 'psicologia@example.com',
                'password' => bcrypt('password'),
                'role' => 'Psicologia',
            ],
        ];

        foreach ($users as $data) {
            $user = \App\Models\User::firstOrCreate([
                'email' => $data['email'],
            ], [
                'name' => $data['name'],
                'password' => $data['password'],
            ]);
            $user->assignRole($data['role']);
        }
    }
}
