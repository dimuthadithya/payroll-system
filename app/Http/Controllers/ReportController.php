<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\Employee;
use Carbon\Carbon;

class ReportController extends Controller
{
    // Show main reports page
    public function index()
    {
        return view('reports.index');
    }

    // Monthly payroll summary
    public function monthly(Request $request)
    {
        $month = $request->month ? Carbon::parse($request->month)->startOfMonth() : Carbon::now()->startOfMonth();

        $payrolls = Payroll::where('month', $month)->get();

        $totalBasic = $payrolls->sum('basic_salary');
        $totalAllowances = $payrolls->sum('total_allowances');
        $totalDeductions = $payrolls->sum('total_deductions');
        $totalNet = $payrolls->sum('net_salary');

        return view('reports.monthly', compact('payrolls', 'month', 'totalBasic', 'totalAllowances', 'totalDeductions', 'totalNet'));
    }

    // Employee payroll history
    public function employee(Employee $employee)
    {
        $payrolls = $employee->payrolls()->orderBy('month', 'desc')->get();

        return view('reports.employee', compact('employee', 'payrolls'));
    }
}
