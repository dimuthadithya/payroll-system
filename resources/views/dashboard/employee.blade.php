<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Employee Dashboard</h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
            <h3 class="text-gray-500 font-semibold">Your Name</h3>
            <p class="text-xl font-bold mt-2">{{ $employee->name }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
            <h3 class="text-gray-500 font-semibold">Latest Net Salary</h3>
            <p class="text-2xl font-bold mt-2">{{ $latestPayroll ? number_format($latestPayroll->net_salary, 2) : 'N/A' }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
            <h3 class="text-gray-500 font-semibold">Total Net Salary (Last 6 months)</h3>
            <p class="text-2xl font-bold mt-2">{{ number_format($totalNet,2) }}</p>
        </div>

    </div>

    <div class="mt-6 bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold mb-4">Recent Payslips</h3>
        <table class="w-full text-left text-sm border-collapse">
            <thead class="bg-gray-100 uppercase text-xs text-gray-700">
                <tr>
                    <th class="px-4 py-3">Month</th>
                    <th class="px-4 py-3">Basic</th>
                    <th class="px-4 py-3">Allowances</th>
                    <th class="px-4 py-3">Deductions</th>
                    <th class="px-4 py-3">Net Salary</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($payrolls as $payroll)
                <tr>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($payroll->month)->format('F Y') }}</td>
                    <td class="px-4 py-3">{{ $payroll->basic_salary }}</td>
                    <td class="px-4 py-3">{{ $payroll->total_allowances }}</td>
                    <td class="px-4 py-3">{{ $payroll->total_deductions }}</td>
                    <td class="px-4 py-3 font-bold">{{ $payroll->net_salary }}</td>
                    <td class="px-4 py-3">
                        <a href="{{ route('payrolls.show', $payroll->id) }}" class="text-blue-600 hover:underline">View Payslip</a>
                    </td>
                </tr>
                @endforeach
                @if($payrolls->isEmpty())
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No payroll data found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>