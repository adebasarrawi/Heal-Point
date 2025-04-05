<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialization;

class DoctorsPageController extends Controller
{
    /**
     * Display a listing of the doctors.
     */
    public function index(Request $request)
    {
        // Start with a base query
        $query = Doctor::query()->where('status', 'approved');

        // Apply search if provided
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhereHas('specialization', function($sq) use ($search) {
                    $sq->where('name', 'like', "%{$search}%");
                });
            });
        }

        // Filter by governorate if selected
        if ($request->filled('governorate')) {
            $query->where('governorate', $request->governorate);
        }

        // Filter by specializations if selected
        if ($request->filled('specializations')) {
            $query->whereIn('specialization_id', $request->specializations);
        }

        // Apply sorting
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'rating':
                    // If you have a rating field or relation
                    // $query->orderBy('rating', 'desc');
                    $query->orderBy('name', 'asc'); // Fallback for now
                    break;
                case 'experience':
                    $query->orderBy('experience_years', 'desc');
                    break;
                default:
                    // Default sort (recommended)
                    $query->orderBy('name', 'asc');
                    break;
            }
        } else {
            // Default sorting
            $query->orderBy('name', 'asc');
        }

        // Get the doctors with pagination
        $doctors = $query->with('specialization')->paginate(9)->withQueryString();

        // Get all specializations for the filter
        $specializations = Specialization::orderBy('name')->get();

        return view('public.doctors', compact('doctors', 'specializations'));
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $doctor = Doctor::with('specialization')->findOrFail($id);

        return view('public.doctor', compact('doctor'));
    }


}
