<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Users') }}
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
                        <h3 class="text-3xl font-bold text-blue-700">User Management</h3>
                        <a href="{{ route('users.create') }}" class="bg-gradient-to-r from-green-400 to-green-500 hover:from-green-500 hover:to-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out shadow-md hover:shadow-lg">
                            Create New User
                        </a>
                    </div>

                    <!-- Users Table -->
                    <table class="table-auto w-full border border-gray-300 bg-white shadow rounded-lg">
                        <thead class="bg-blue-200 text-blue-900 font-semibold rounded-lg">
                            <tr>
                                <th class="px-6 py-3 border border-gray-300 text-left">Name</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Email</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Role</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($users as $user)
                                <tr class="@if($loop->even) bg-gray-50 @endif hover:bg-gray-100 transition duration-150 ease-in-out">
                                    <td class="border border-gray-300 px-6 py-4">{{ $user->name }}</td>
                                    <td class="border border-gray-300 px-6 py-4">{{ $user->email }}</td>
                                    <td class="border border-gray-300 px-6 py-4">{{ $user->getRoleNames()->implode(', ') }}</td>
                                    <td class="border border-gray-300 px-6 py-4 space-x-2 flex">
                                        <!-- View Button -->
                                        <a href="{{ route('users.show', $user->id) }}" class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white py-1 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                                            View
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('users.edit', $user->id) }}" class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-white py-1 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <button type="button" onclick="openModal('{{ $user->id }}')" class="bg-gradient-to-r from-red-400 to-red-500 hover:from-red-500 hover:to-red-600 text-white py-1 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- User Role Chart -->
                <div class="p-6 flex flex-col items-center">
                    <h3 class="text-2xl font-semibold text-blue-700 mb-4">Number of Users by Role</h3>
                    <canvas id="userRoleChart" width="150" height="150" style="max-width: 300px; max-height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Delete Confirmation -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg p-6 shadow-lg w-1/3">
            <h2 class="text-xl font-bold text-red-600 mb-4">Confirm Deletion</h2>
            <p>Are you sure you want to delete this user?</p>
            <div class="mt-4 flex justify-end">
                <button id="confirmDelete" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-lg mr-2">Delete</button>
                <button onclick="closeModal()" class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roles = {!! json_encode($roles) !!};
            const counts = {!! json_encode($counts) !!};

            const ctx = document.getElementById('userRoleChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: roles,
                    datasets: [{
                        label: 'Number of Users',
                        data: counts,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 99, 132, 0.7)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        });

        let userIdToDelete = null;

        function openModal(userId) {
            userIdToDelete = userId; // Store the user ID to delete
            document.getElementById('deleteModal').classList.remove('hidden'); // Show the modal
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden'); // Hide the modal
            userIdToDelete = null; // Clear the user ID
        }

        document.getElementById('confirmDelete').onclick = function() {
            if (userIdToDelete) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/users/${userIdToDelete}`;
                form.innerHTML = `
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-app-layout>
