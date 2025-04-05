<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
// use App\Http\Requests\Request;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;




class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.dashboard');
        $admins = Admin::orderBy('id','desc')->paginate(5);
        return view('admin.admins',compact('admins'));
    }



    public function create()
    {

    }


  


    public function show(Admin $admin)
    {

    }


    public function edit(Admin $admin)
    {

    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins,email,'.$admin->id,
            'password'=>'required|confirmed|min:6',
        ]);

        $admin->update($request->all());
        return redirect()->route('admins.index')->with('success','Admin updated successfully');
    }


    public function destroy(Admin $admin)
    {
        // dd($admin->id);
        $admin->delete();
        return redirect()->back()->with('success','Admin deleted successfully');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
            'phone' => 'nullable|string|max:20',
            'permissions' => 'required|array', // Ensure permissions is an array
        ]);

        // Create the admin
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'phone' => $request->phone,
            'permissions' => json_encode($request->permissions), // Save permissions as JSON
        ]);

        // Redirect with success message
        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    public function chart()
    {
        // Total counts
        $totalUsers = User::count();
        $totalDoctors = Doctor::count();
        $totalSpecializations = Specialization::count();
        $totalAppointments = Appointment::count();

        // Pie Chart: Doctors by specialization
        $specializationCounts = Specialization::withCount('doctors')
            ->get()
            ->map(function ($specialization) {
                return [
                    'name' => $specialization->name,
                    'count' => $specialization->doctors_count,
                ];
            });

        // Horizontal Bar Chart: Top 5 specializations with the most doctors
        $topSpecializations = Specialization::withCount('doctors')
            ->orderByDesc('doctors_count')
            ->take(5)
            ->get()
            ->map(function ($specialization) {
                return [
                    'name' => $specialization->name,
                    'count' => $specialization->doctors_count,
                ];
            });

        // Pass all data to the view
        return view('admin.chart', compact(
            'totalUsers',
            'totalDoctors',
            'totalSpecializations',
            'totalAppointments',
            'specializationCounts',
            'topSpecializations'
        ));
    }

}
