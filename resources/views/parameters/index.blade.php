<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Payroll Parameters</h2>
    </x-slot>

    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('parameters.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
            + Add Parameter
        </a>
    </div>

    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Value</th>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($parameters as $parameter)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $parameter->id }}</td>
                    <td class="px-4 py-3">{{ $parameter->name }}</td>
                    <td class="px-4 py-3">{{ ucfirst($parameter->type) }}</td>
                    <td class="px-4 py-3">{{ $parameter->value }}</td>
                    <td class="px-4 py-3">{{ $parameter->description }}</td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('parameters.edit', $parameter->id) }}" class="text-yellow-600 hover:underline mr-3">Edit</a>
                        <form action="{{ route('parameters.destroy', $parameter->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this parameter?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No parameters found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>