<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Admin Dashboard</h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
            <h3 class="text-gray-500 font-semibold">Employees</h3>
            <p class="text-3xl font-bold mt-2">{{ $employees }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
            <h3 class="text-gray-500 font-semibold">Payrolls This Month</h3>
            <p class="text-3xl font-bold mt-2">{{ $payrolls }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
            <h3 class="text-gray-500 font-semibold">Total Payroll Amount</h3>
            <p class="text-3xl font-bold mt-2">{{ number_format($totalNet,2) }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
            <h3 class="text-gray-500 font-semibold">Parameters</h3>
            <p class="text-3xl font-bold mt-2">{{ $parameters }}</p>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <a href="{{ route('employees.index') }}" class="p-6 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 text-center font-semibold">
            Manage Employees
        </a>

        <a href="{{ route('parameters.index') }}" class="p-6 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 text-center font-semibold">
            Manage Parameters
        </a>

        <a href="{{ route('payrolls.index') }}" class="p-6 bg-purple-600 text-white rounded-lg shadow hover:bg-purple-700 text-center font-semibold">
            View Payrolls
        </a>

        <a href="{{ route('reports.index') }}" class="p-6 bg-orange-600 text-white rounded-lg shadow hover:bg-orange-700 text-center font-semibold">
            Reports
        </a>
    </div>
</x-app-layout>