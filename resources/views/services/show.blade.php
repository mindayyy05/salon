<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Service Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ $service->name }}</h3>
                    <p class="mb-4"><strong>Category:</strong> {{ $service->category->name }}</p>
                    <p class="mb-4"><strong>Stylist:</strong> {{ $service->stylist->name }}</p>
                    <p class="mb-4"><strong>Price:</strong> ${{ $service->price }}</p>
                    <p class="mb-4"><strong>Duration:</strong> {{ $service->duration }}</p>
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">Back to Services</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
