<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Parameter;
use App\Models\Payroll;
use Carbon\Carbon;

class PayrollSeeder extends Seeder
{
    public function run()
    {
        $month = Carbon::now()->startOfMonth(); // Current month
        $employees = Employee::all();
        $parameters = Parameter::all();

        foreach ($employees as $employee) {
            // Skip if payroll already exists for this month
            if (Payroll::where('employee_id', $employee->id)->where('month', $month)->exists()) {
                continue;
            }

            $allowances = $parameters->where('type', 'allowance')->sum('value');
            $deductions = $parameters->where('type', 'deduction')->sum('value');

            Payroll::create([
                'employee_id' => $employee->id,
                'basic_salary' => $employee->basic_salary,
                'total_allowances' => $allowances,
                'total_deductions' => $deductions,
                'net_salary' => $employee->basic_salary + $allowances - $deductions,
                'month' => $month,
            ]);
        }
    }
}
