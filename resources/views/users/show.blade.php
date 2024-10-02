<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">User Information</h3>

                    <div class="mb-4">
                        <label class="block text-gray-700">Name:</label>
                        <p class="text-gray-900">{{ $user->name }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Email:</label>
                        <p class="text-gray-900">{{ $user->email }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Role:</label>
                        <p class="text-gray-900">{{ ucfirst($user->role) }}</p>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('users.index') }}"
                            class="bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md shadow hover:bg-indigo-700 transition duration-300">Back
                            to Users List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
