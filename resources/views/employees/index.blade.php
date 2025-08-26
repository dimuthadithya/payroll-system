<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Employees
        </h2>
    </x-slot>

    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('employees.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
            + Add Employee
        </a>
    </div>

    @if(session('success'))
    <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Employee ID</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Department</th>
                    <th class="px-4 py-3">Position</th>
                    <th class="px-4 py-3">Basic Salary</th>
                    <th class="px-4 py-3">Joined At</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($employees as $employee)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $employee->id }}</td>
                    <td class="px-4 py-3">{{ $employee->employee_id }}</td>
                    <td class="px-4 py-3 font-medium">{{ $employee->name }}</td>
                    <td class="px-4 py-3">{{ $employee->email }}</td>
                    <td class="px-4 py-3">{{ $employee->department }}</td>
                    <td class="px-4 py-3">{{ $employee->position }}</td>
                    <td class="px-4 py-3">{{ number_format($employee->basic_salary, 2) }}</td>
                    <td class="px-4 py-3">
                        {{ $employee->joined_at ? $employee->joined_at->format('Y-m-d') : '-' }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('employees.edit', $employee->id) }}"
                            class="text-yellow-600 hover:underline mr-3">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}"
                            method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Delete this employee?')"
                                class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-6 text-center text-gray-500">
                        No employees found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>