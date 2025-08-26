<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'user_id' => null,
                'employee_id' => 'EMP001',
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '0711234567',
                'department' => 'IT',
                'position' => 'Software Engineer',
                'basic_salary' => 50000,
                'bank_account' => '1234567890',
                'joined_at' => '2023-01-10',
            ],
            [
                'user_id' => null,
                'employee_id' => 'EMP002',
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '0719876543',
                'department' => 'HR',
                'position' => 'HR Executive',
                'basic_salary' => 40000,
                'bank_account' => '0987654321',
                'joined_at' => '2023-02-15',
            ],
            [
                'user_id' => null,
                'employee_id' => 'EMP003',
                'name' => 'Bob Williams',
                'email' => 'bob@example.com',
                'phone' => '0715558888',
                'department' => 'Finance',
                'position' => 'Accountant',
                'basic_salary' => 45000,
                'bank_account' => '1122334455',
                'joined_at' => '2023-03-01',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
