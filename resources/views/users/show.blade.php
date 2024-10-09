<!-- resources/views/users/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 bg-gradient-to-r from-blue-100 to-blue-50 border-b border-gray-200 rounded-t-lg">
                    <h3 class="text-lg font-semibold mb-4">User Information</h3>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium">Name:</label>
                        <p class="text-gray-900">{{ $user->name }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium">Email:</label>
                        <p class="text-gray-900">{{ $user->email }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium">Role:</label>
                        <p class="text-gray-900">{{ ucfirst($user->role) }}</p>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('users.index') }}" class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                            Back to Users List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
