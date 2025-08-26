<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parameters = [
            ['name' => 'Tax', 'type' => 'deduction', 'value' => 10, 'description' => 'Income tax %'],
            ['name' => 'Overtime', 'type' => 'allowance', 'value' => 1.5, 'description' => 'Overtime multiplier'],
            ['name' => 'Transport Allowance', 'type' => 'allowance', 'value' => 5000, 'description' => 'Monthly transport allowance'],
            ['name' => 'Health Deduction', 'type' => 'deduction', 'value' => 2000, 'description' => 'Health insurance deduction'],
        ];

        foreach ($parameters as $param) {
            Parameter::create($param);
        }
    }
}
