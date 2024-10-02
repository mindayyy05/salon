<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('users.create') }}"
                        class="bg-blue-600 text-white font-bold py-2 px-4 rounded shadow hover:bg-blue-700 transition duration-300 mb-4">Create
                        New User</a>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Role</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Display the user's roles -->
                                        {{ $user->getRoleNames()->implode(', ') }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="bg-gray-500 text-white font-semibold py-1 px-3 rounded-md shadow hover:bg-gray-600 transition duration-300 mr-2">View</a>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="bg-yellow-500 text-white font-semibold py-1 px-3 rounded-md shadow hover:bg-yellow-600 transition duration-300 mr-2">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white font-semibold py-1 px-3 rounded-md shadow hover:bg-red-600 transition duration-300">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
