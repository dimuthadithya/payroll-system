<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Parameter;
use Carbon\Carbon;

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
}
