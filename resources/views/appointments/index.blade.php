<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 bg-gradient-to-r from-blue-100 to-blue-50 border-b border-gray-200 rounded-t-lg">
                    <!-- Title Section -->
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-3xl font-bold text-blue-700">Appointment Management</h3>
                    </div>

                    <!-- Appointments Table -->
                    <table class="table-auto w-full border border-gray-300 bg-white shadow rounded-lg">
                        <thead class="bg-blue-200 text-blue-900 font-semibold rounded-lg">
                            <tr>
                                <th class="px-6 py-3 border border-gray-300 text-left">Customer</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Service</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Stylist</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Appointment Time</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Status</th>
                                <th class="px-6 py-3 border border-gray-300 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($appointments as $appointment)
                                <tr class="@if($loop->even) bg-gray-50 @endif hover:bg-gray-100 transition duration-150 ease-in-out">
                                    <td class="border border-gray-300 px-6 py-4">{{ $appointment->user->name }}</td>
                                    <td class="border border-gray-300 px-6 py-4">{{ $appointment->service->name }}</td>
                                    <td class="border border-gray-300 px-6 py-4">{{ $appointment->stylist->name }}</td>
                                    <td class="border border-gray-300 px-6 py-4">{{ $appointment->appointment_time }}</td>
                                    <td class="border border-gray-300 px-6 py-4">{{ ucfirst($appointment->status) }}</td>
                                    <td class="border border-gray-300 px-6 py-4">
                                        <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <select name="status" onchange="openModal('{{ $appointment->id }}', this.value, '{{ ucfirst($appointment->status) }}')">
                                                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="accepted" {{ $appointment->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="rejected" {{ $appointment->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
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

    <!-- Modal for Status Change Confirmation -->
    <div id="statusChangeModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg p-6 shadow-lg w-1/3">
            <h2 class="text-xl font-bold text-blue-600 mb-4">Confirm Status Change</h2>
            <p id="statusChangeMessage">Are you sure you want to change the status?</p>
            <div class="mt-4 flex justify-end">
                <button id="cancelBtn" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button id="confirmBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Confirm</button>
            </div>
        </div>
    </div>

    <script>
       let selectedStatus, selectedForm, originalStatus;

function openModal(appointmentId, status, currentStatus) {
    selectedStatus = status;
    originalStatus = currentStatus;
    selectedForm = document.querySelector(`form[action$="${appointmentId}"]`);

    document.getElementById('statusChangeModal').classList.remove('hidden');
    document.getElementById('statusChangeMessage').textContent = `Are you sure you want to change the status to ${status}?`;
}

// Add event listeners for the confirm and cancel buttons
document.getElementById('confirmBtn').addEventListener('click', function () {
    document.getElementById('statusChangeModal').classList.add('hidden');
    selectedForm.submit(); // Submit the form to update the status
});

document.getElementById('cancelBtn').addEventListener('click', function () {
    document.getElementById('statusChangeModal').classList.add('hidden');
    
    // Reset the dropdown to its original value
    if (selectedForm) {
        const dropdown = selectedForm.querySelector('select[name="status"]');
        if (dropdown) {
            dropdown.value = originalStatus.toLowerCase(); // Reset to original status
        }
    }
});

    </script>
</x-app-layout>
