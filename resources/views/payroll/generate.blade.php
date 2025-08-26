<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">Generate Payroll</h2>
    </x-slot>

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow mt-32">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('payrolls.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">← Back to Payrolls</a>
        </div>

        @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('payrolls.store') }}" method="POST" class="grid grid-cols-1 gap-6">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium mb-1">Month</label>
                <input type="month" name="month" value="{{ old('month') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
                    Generate Payroll
                </button>
            </div>
        </form>
    </div>
</x-app-layout>