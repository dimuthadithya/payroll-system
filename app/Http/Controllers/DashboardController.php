<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Parameter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $employees = Employee::count();
        $payrolls = Payroll::whereMonth('month', Carbon::now()->month)->count();
        $totalNet = Payroll::whereMonth('month', Carbon::now()->month)->sum('net_salary');
        $parameters = Parameter::count();

        return view('dashboard.admin', compact('employees', 'payrolls', 'totalNet', 'parameters'));
    }

    public function hr()
    {
        $employees = Employee::count();
        $payrolls = Payroll::whereMonth('month', Carbon::now()->month)->count();
        $totalNet = Payroll::whereMonth('month', Carbon::now()->month)->sum('net_salary');

        return view('dashboard.hr', compact('employees', 'payrolls', 'totalNet'));
    }

    public function employee()
    {
        $user = Auth::user();
        // Debug information
        dd([
            'user_id' => $user->id,
            'user_email' => $user->email,
            'has_employee' => $user->employee ? 'yes' : 'no'
        ]);

        $employee = $user->employee; // Assuming User hasOne Employee

        if (!$employee) {
            // If no employee record exists, redirect with an error message
            return redirect()->back()->with('error', 'No employee record found for your account. Please contact HR.');
        }

        $payrolls = $employee->payrolls()->orderBy('month', 'desc')->take(6)->get(); // Last 6 months
        $latestPayroll = $payrolls->first();
        $totalNet = $payrolls->sum('net_salary');

        return view('dashboard.employee', compact('employee', 'payrolls', 'latestPayroll', 'totalNet'));
    }
}
