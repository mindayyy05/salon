<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Store a new appointment (from Flutter App)
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'stylist_id' => 'required|exists:stylists,id',
            'appointment_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        try {
            // Create a new appointment
            $appointment = Appointment::create([
                'user_id' => $request->input('user_id'),
                'service_id' => $request->input('service_id'),
                'stylist_id' => $request->input('stylist_id'),
                'appointment_time' => $request->input('appointment_time'),
                'status' => 'pending',
            ]);

            return response()->json(['message' => 'Appointment booked successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to book appointment: ' . $e->getMessage()], 500);
        }
    }

    // Get all appointments (For Admin Table View)
    public function index()
    {
        try {
            $appointments = Appointment::with('user', 'service', 'stylist')->get();
            return view('appointments.index', compact('appointments'));
        } catch (\Exception $e) {
            return redirect()->route('appointments.index')->with('error', 'Failed to retrieve appointments: ' . $e->getMessage());
        }
    }

    // Update the status of an appointment (From Laravel Admin)
    public function updateStatus(Request $request, $id)
    {
        try {
            $appointment = Appointment::findOrFail($id);

            // Validate the status input
            $request->validate([
                'status' => 'required|in:pending,accepted,rejected',
            ]);

            // Update the status
            $appointment->status = $request->status;
            $appointment->save();

            return redirect()->route('appointments.index')->with('success', 'Appointment status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('appointments.index')->with('error', 'Failed to update appointment status: ' . $e->getMessage());
        }
    }

    // Fetch all appointments for a specific user (From Flutter App)
    public function getAppointmentsByUser($userId)
    {
       
        try {
            $appointments = Appointment::where('user_id', $userId)->with('service', 'stylist')->get();
            return response()->json($appointments, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve appointments: ' . $e->getMessage()], 500);
        }
    }
}
