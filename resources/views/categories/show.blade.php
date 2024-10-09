<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 bg-gradient-to-r from-blue-100 to-blue-50 border-b border-gray-200 rounded-t-lg">
                    <h3 class="text-3xl font-bold text-blue-700 mb-4">{{ $category->name }}</h3>
                    <p class="text-gray-700 mb-4">{{ $category->description }}</p>
                    <a href="{{ route('categories.index') }}" class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                        Back to Categories
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
