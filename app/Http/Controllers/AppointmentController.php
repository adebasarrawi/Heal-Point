<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Doctor;
use App\Models\DoctorUnavailability;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $appointments = Appointment::with(['patient', 'doctor'])
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->whereHas('doctor', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%");
                        })
                        ->orWhereHas('patient', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%");
                        })
                        ->orWhereDate('appointment_date', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%")
                        ->orWhere('payment_status', 'like', "%{$search}%");
                });
            })
            ->orderBy('id','desc')
            ->paginate(5);
        $doctors = Doctor::all(); // Assuming you have a Doctor model
        $patients = Patient::all(); // Assuming you have a Patient model

        return view('admin.appointments', compact('appointments', 'doctors', 'patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = \App\Models\Doctor::all();
        $patients = \App\Models\Patient::all();

        return view('admin.appointments.create', compact('doctors', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        // Convert time to proper format
        $time = date('H:i:s', strtotime($request->appointment_time));

        $appointment = Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $time,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        $appointment->load('doctor', 'patient');

        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $doctors = \App\Models\Doctor::all();
        $patients = \App\Models\Patient::all();

        return view('admin.appointments.edit', compact('appointment', 'doctors', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    // {
    //     // $validated = $request->validated();
    //     // $appointment->update($validated);

    //     // return redirect()->route('admin.appointments.index')->with('success', 'Appointment updated successfully.');
    // }

    public function rules()
    {
        return [
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'nullable|exists:patients,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,canceled',
            'payment_status' => 'required|in:paid,unpaid',
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        // $appointment->delete();

        // return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    public function update(Request $request, Appointment $appointmentId)
    {
        $previousStatus = $appointmentId->status;
        $newStatus = $request->status;


        // Update the appointment status
        $appointmentId->update(['status' => $newStatus]);


        if ($newStatus === 'confirmed' && $previousStatus !== 'confirmed') {
            // Add to unavailabilities only if it wasn't already confirmed
            DoctorUnavailability::create([
                'doctor_id' => $appointmentId->doctor_id,
                'date' => $appointmentId->appointment_date,
                'start_time' => $appointmentId->appointment_time,
            ]);
        }
        elseif ($newStatus === 'canceled' && $previousStatus === 'confirmed') {
            // Only remove from unavailabilities if it was previously confirmed
            DoctorUnavailability::where([
                'doctor_id' => $appointmentId->doctor_id,
                'date' => $appointmentId->appointment_date,
                'start_time' => $appointmentId->appointment_time,
            ])->delete();
        }

        $message = match($newStatus) {
            'confirmed' => 'Appointment confirmed successfully.',
            'canceled' => 'Appointment canceled successfully.',
            default => 'Appointment status updated successfully.'
        };

        return back()->with('success', $message);
    }
}
