<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Service Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 bg-gradient-to-r from-blue-100 to-blue-50 border-b border-gray-200 rounded-t-lg">
                    <h3 class="text-lg font-semibold mb-4">{{ $service->name }}</h3>
                    <p class="mb-4"><strong>Category:</strong> {{ $service->category->name }}</p>
                    <p class="mb-4"><strong>Stylist:</strong> {{ $service->stylist->name }}</p>
                    <p class="mb-4"><strong>Price:</strong> LKR. {{ $service->price }}</p>
                    <p class="mb-4"><strong>Duration:</strong> {{ $service->duration }} minutes</p>
                    <a href="{{ route('services.index') }}" class="bg-gradient-to-r from-green-400 to-green-500 hover:from-green-500 hover:to-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out shadow-md hover:shadow-lg">
                        Back to Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
