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
                'name' => 'Admin User',
                'role' => 'admin',
                'status' => 'approved',
                'email' => 'ad@ad.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password')
            ],
            [
                'name' => 'HR User',
                'role' => 'hr',
                'status' => 'approved',
                'email' => 'hr@hr.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Employee User',
                'role' => 'new',
                'status' => 'pending',
                'email' => 'em@em.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
