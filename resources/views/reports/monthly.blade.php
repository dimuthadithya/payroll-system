<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">Monthly Payroll Summary</h2>
    </x-slot>

    <form method="GET" action="{{ route('reports.monthly') }}" class="mb-6">
        <input type="month" name="month" value="{{ \Carbon\Carbon::parse($month)->format('Y-m') }}" class="border px-2 py-1 rounded">
        <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded">Filter</button>
    </form>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-left text-sm border-collapse">
            <thead class="bg-gray-100 uppercase text-xs text-gray-700">
                <tr>
                    <th class="px-4 py-3">Employee</th>
                    <th class="px-4 py-3">Basic</th>
                    <th class="px-4 py-3">Allowances</th>
                    <th class="px-4 py-3">Deductions</th>
                    <th class="px-4 py-3">Net Salary</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($payrolls as $payroll)
                <tr>
                    <td class="px-4 py-3">{{ $payroll->employee->name }}</td>
                    <td class="px-4 py-3">{{ $payroll->basic_salary }}</td>
                    <td class="px-4 py-3">{{ $payroll->total_allowances }}</td>
                    <td class="px-4 py-3">{{ $payroll->total_deductions }}</td>
                    <td class="px-4 py-3 font-bold">{{ $payroll->net_salary }}</td>
                </tr>
                @endforeach
                <tr class="font-bold bg-gray-50">
                    <td class="px-4 py-3">Total</td>
                    <td class="px-4 py-3">{{ $totalBasic }}</td>
                    <td class="px-4 py-3">{{ $totalAllowances }}</td>
                    <td class="px-4 py-3">{{ $totalDeductions }}</td>
                    <td class="px-4 py-3">{{ $totalNet }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>