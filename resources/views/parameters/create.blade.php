<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">Add Parameter</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow mt-8">
        <div class="flex justify-between items-center mb-6"><a href="{{ route('parameters.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">← Back to Parameters</a></div>

        @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('parameters.store') }}" method="POST" class="grid grid-cols-1 gap-6">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Type</label>
                <select name="type" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Select type</option>
                    <option value="deduction" {{ old('type')=='deduction'?'selected':'' }}>Deduction</option>
                    <option value="allowance" {{ old('type')=='allowance'?'selected':'' }}>Allowance</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Value</label>
                <input type="number" step="0.01" name="value" value="{{ old('value') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Description</label>
                <textarea name="description" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">Add Parameter</button>
            </div>
        </form>
    </div>
</x-app-layout>