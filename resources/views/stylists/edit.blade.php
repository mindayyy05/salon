<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Stylist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('stylists.update', $stylist->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Stylist Name</label>
                            <input type="text" name="name" id="name" value="{{ $stylist->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                            <textarea name="bio" id="bio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $stylist->bio }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Stylist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
