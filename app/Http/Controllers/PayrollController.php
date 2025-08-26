<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Parameter;
use App\Models\Payroll;
use Carbon\Carbon;

class PayrollController extends Controller
{
    // Show payroll list
    public function index()
    {
        $payrolls = Payroll::with('employee')->orderBy('month', 'desc')->get();
        return view('payroll.index', compact('payrolls'));
    }

    // Show generate payroll form
    public function create()
    {
        return view('payroll.generate');
    }

    // Generate payroll for a specific month
    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|date',
        ]);

        $month = Carbon::parse($request->month)->startOfMonth();

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

        return redirect()->route('payrolls.index')->with('success', 'Payroll generated successfully!');
    }

    // View individual payslip
    public function show(Payroll $payroll)
    {
        return view('payroll.show', compact('payroll'));
    }

    // Delete payroll
    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return redirect()->route('payrolls.index')->with('success', 'Payroll deleted!');
    }
}
