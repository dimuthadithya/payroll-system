<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">Payroll History: {{ $employee->name }}</h2>
    </x-slot>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-left text-sm border-collapse">
            <thead class="bg-gray-100 uppercase text-xs text-gray-700">
                <tr>
                    <th class="px-4 py-3">Month</th>
                    <th class="px-4 py-3">Basic</th>
                    <th class="px-4 py-3">Allowances</th>
                    <th class="px-4 py-3">Deductions</th>
                    <th class="px-4 py-3">Net Salary</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>