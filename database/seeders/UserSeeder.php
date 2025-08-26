<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'ad@ad.com',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ],
            [
                'name' => 'John Doe',
                'email' => 'hr@hr.com',
                'password' => bcrypt('password'),
                'role' => 'hr'
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'em@em.com',
                'password' => bcrypt('password'),
                'role' => 'employee'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
