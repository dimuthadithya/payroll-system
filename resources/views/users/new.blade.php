<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">New Users</h2>
    </x-slot>

    <div class="p-10 bg-white shadow-sm rounded-lg mx-48 mt-10">
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Role</th>
                    <th class="border px-4 py-2">Joined</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($newUsers as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($user->role) }}</td>
                    <td class="border px-4 py-2">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="border px-4 py-2 text-center">
                        <form method="POST" action="{{ route('users.toggleRole', $user->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="px-4 py-2 rounded-lg 
                                {{ $user->role === 'new' ? 'bg-green-600 hover:bg-green-700' : 'bg-yellow-600 hover:bg-yellow-700' }} 
                                text-white font-semibold">
                                {{ $user->role === 'new' ? 'Make Employee' : 'Make New' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No new users found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>