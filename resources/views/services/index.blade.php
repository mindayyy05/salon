<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 bg-gradient-to-r from-blue-100 to-blue-50 border-b border-gray-200 rounded-t-lg">
                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="my-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    <!-- Title Section -->
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-3xl font-bold text-blue-700">Service Management</h3>
                        <a href="{{ route('services.create') }}" class="bg-gradient-to-r from-green-400 to-green-500 hover:from-green-500 hover:to-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out shadow-md hover:shadow-lg">
                            Create New Service
                        </a>
                    </div>

                    <!-- Services Table -->
                    <table class="table-auto w-full border border-gray-300 bg-white shadow rounded-lg">
                        <thead class="bg-blue-200 text-blue-900 font-semibold rounded-lg">
                            <tr>
                                <th class="px-6 py-3 border border-gray-300 text-left">Name</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Category</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Stylist</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Price (Rs)</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Duration</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($services as $service)
                                <tr class="@if($loop->even) bg-gray-50 @endif hover:bg-gray-100 transition duration-150 ease-in-out">
                                    <td class="border border-gray-300 px-6 py-4">{{ $service->name }}</td>
                                    <td class="border border-gray-300 px-6 py-4">{{ $service->category->name }}</td>
                                    <td class="border border-gray-300 px-6 py-4">{{ $service->stylist->name }}</td>
                                    <td class="border border-gray-300 px-6 py-4">Rs {{ number_format($service->price, 2) }}</td>
                                    <td class="border border-gray-300 px-6 py-4">{{ $service->duration }}</td>
                                    <td class="border border-gray-300 px-6 py-4 space-x-2 flex">
                                        <!-- View Button -->
                                        <a href="{{ route('services.show', $service->id) }}" class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white py-1 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                                            View
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('services.edit', $service->id) }}" class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-white py-1 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <button onclick="openModal({{ $service->id }})" class="bg-gradient-to-r from-red-400 to-red-500 hover:from-red-500 hover:to-red-600 text-white py-1 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Delete Confirmation -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg p-6 shadow-lg w-1/3">
            <h2 class="text-xl font-bold text-red-600 mb-4">Confirm Deletion</h2>
            <p>Are you sure you want to delete this service?</p>
            <div class="mt-4 flex justify-end">
                <form id="deleteForm" action="" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-lg mr-2">Delete</button>
                </form>
                <button onclick="closeModal()" class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(serviceId) {
            // Set the action of the delete form
            document.getElementById('deleteForm').action = '/services/' + serviceId;
            // Show the modal
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal() {
            // Hide the modal
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
