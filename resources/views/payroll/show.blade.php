<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">Payslip: {{ $payroll->employee->name }}</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <a href="{{ route('payrolls.index') }}" class="text-blue-600 hover:underline mb-4 inline-block">← Back to Payrolls</a>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div><strong>Employee:</strong> {{ $payroll->employee->name }}</div>
            <div><strong>Month:</strong> {{ \Carbon\Carbon::parse($payroll->month)->format('F Y') }}</div>
            <div><strong>Basic Salary:</strong> {{ $payroll->basic_salary }}</div>
            <div><strong>Total Allowances:</strong> {{ $payroll->total_allowances }}</div>
            <div><strong>Total Deductions:</strong> {{ $payroll->total_deductions }}</div>
            <div><strong>Net Salary:</strong> {{ $payroll->net_salary }}</div>
        </div>
    </div>
</x-app-layout>