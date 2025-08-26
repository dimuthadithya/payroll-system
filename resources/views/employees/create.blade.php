<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Add Employee
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <a href="{{ route('employees.index') }}"
            class="text-blue-600 hover:underline mb-4 inline-block">← Back to Employee List</a>

        @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Employee ID</label>
                    <input type="text" name="employee_id" value="{{ old('employee_id') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Department</label>
                    <input type="text" name="department" value="{{ old('department') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Position</label>
                    <input type="text" name="position" value="{{ old('position') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Basic Salary</label>
                    <input type="number" step="0.01" name="basic_salary" value="{{ old('basic_salary') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Bank Account</label>
                    <input type="text" name="bank_account" value="{{ old('bank_account') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Joined Date</label>
                    <input type="date" name="joined_at" value="{{ old('joined_at') }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
                        Add Employee
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>