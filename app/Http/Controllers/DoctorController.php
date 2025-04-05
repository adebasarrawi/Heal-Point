<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

use App\Models\Specialization;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    // public function show(Doctor $doctor)
    // {
    //     return view('doctor.index');
    // }

    public function index(Request $request)
    {
        $search = $request->query('search');

        // Fetch doctors with pagination and search
        $doctors = Doctor::with('specialization')
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('doctors.name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('governorate', 'like', "%{$search}%")
                        ->orWhereHas('specialization', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%");
                        });
                });
            })->paginate(10);

        // Fetch all specializations
        $specializations = Specialization::all();

        // Pass both variables to the view
        return view('admin.doctors.index', compact('doctors', 'specializations'));
    }


   /**
     */
    public function edit(Doctor $doctor)
    {
        $specializations = Specialization::all();
        return view('view.doctor.edit', compact('doctors', 'specializations'));
    }

    /**
     * Update the specified doctor in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {

        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:doctors,email,'.$doctor->id,
        //     'phone' => 'nullable|string|max:20',
        //     'specialization_id' => 'required|exists:specializations,id',
        //     'governorate' => 'nullable|string',
        //     'address' => 'nullable|string',
        //     'experience_years' => 'nullable|integer|min:0',
        //     'price_per_appointment' => 'nullable|numeric|min:0',
        //     'bio' => 'nullable|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'doctor_document' => 'nullable|file|mimes:pdf|max:5120',
        //     'status' => 'required|in:pending,approved,rejected',
        //     'monday' => 'nullable|boolean',
        //     'tuesday' => 'nullable|boolean',
        //     'wednesday' => 'nullable|boolean',
        //     'thursday' => 'nullable|boolean',
        //     'friday' => 'nullable|boolean',
        //     'saturday' => 'nullable|boolean',
        //     'sunday' => 'nullable|boolean',
        //     'working_hours_start' => 'nullable|date_format:H:i',
        //     'working_hours_end' => 'nullable|date_format:H:i|after:working_hours_start',
        // ]);


        $data = $request->except(['image', 'doctor_document', 'password']);

        // Handle password update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($doctor->image) {
                Storage::disk('public')->delete($doctor->image);
            }
            $data['image'] = $request->file('image')->store('doctors/images', 'public');
        }

        // Handle document upload
        if ($request->hasFile('doctor_document')) {
            // Delete old document if exists
            if ($doctor->doctor_document) {
                Storage::disk('public')->delete($doctor->doctor_document);
            }
            $data['doctor_document'] = $request->file('doctor_document')->store('doctors/documents', 'public');
        }

        // Update boolean fields for days
        foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day) {
            $data[$day] = $request->has($day);
        }

        $doctor->update($data);

        return back()->with('success', 'Doctor updated successfully!');
    }

    public function updateStatus(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $doctor->update(['status' => $validated['status']]);

        return back()->with('success', "Doctor status updated to {$validated['status']} successfully!");
    }

    /**
     * Remove the specified doctor from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}

