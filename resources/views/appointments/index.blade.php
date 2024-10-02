<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Customer</th>
                                <th class="px-4 py-2">Service</th>
                                <th class="px-4 py-2">Stylist</th>
                                <th class="px-4 py-2">Appointment Time</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td class="border px-4 py-2">{{ $appointment->user->name }}</td>
                                    <td class="border px-4 py-2">{{ $appointment->service->name }}</td>
                                    <td class="border px-4 py-2">{{ $appointment->stylist->name }}</td>
                                    <td class="border px-4 py-2">{{ $appointment->appointment_time }}</td>
                                    <td class="border px-4 py-2">{{ ucfirst($appointment->status) }}</td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('appointments.updateStatus', $appointment->id) }}"
                                            method="POST">
                                            @csrf
                                            <select name="status" onchange="this.form.submit()"
                                                class="border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                <option value="pending"
                                                    {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="accepted"
                                                    {{ $appointment->status == 'accepted' ? 'selected' : '' }}>Accepted
                                                </option>
                                                <option value="rejected"
                                                    {{ $appointment->status == 'rejected' ? 'selected' : '' }}>Rejected
                                                </option>
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
</x-app-layout>
