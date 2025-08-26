<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Reports</h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <a href="{{ route('reports.monthly') }}" class="p-6 bg-white rounded-lg shadow hover:bg-gray-50 text-center font-semibold">
            Monthly Payroll Summary
        </a>

        <a href="{{ route('employees.index') }}" class="p-6 bg-white rounded-lg shadow hover:bg-gray-50 text-center font-semibold">
            Employee Payroll History
        </a>
    </div>
</x-app-layout>