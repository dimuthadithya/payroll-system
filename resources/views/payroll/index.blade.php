<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">Payrolls</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow mt-8">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('payrolls.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Generate Payroll
            </a>
        </div>

        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg ">
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Employee</th>
                        <th class="px-4 py-3">Month</th>
                        <th class="px-4 py-3">Basic Salary</th>
                        <th class="px-4 py-3">Allowances</th>
                        <th class="px-4 py-3">Deductions</th>
                        <th class="px-4 py-3">Net Salary</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($payrolls as $payroll)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $payroll->employee->name }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($payroll->month)->format('F Y') }}</td>
                        <td class="px-4 py-3">{{ $payroll->basic_salary }}</td>
                        <td class="px-4 py-3">{{ $payroll->total_allowances }}</td>
                        <td class="px-4 py-3">{{ $payroll->total_deductions }}</td>
                        <td class="px-4 py-3 font-bold">{{ $payroll->net_salary }}</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('payrolls.show', $payroll->id) }}" class="text-blue-600 hover:underline mr-3">View</a>
                            <form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this payroll?')" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">No payrolls found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>