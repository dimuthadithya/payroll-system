<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">Payslip: {{ $payroll->employee->name }}</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow mt-32">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('payrolls.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">← Back to Payrolls</a>
        </div>

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