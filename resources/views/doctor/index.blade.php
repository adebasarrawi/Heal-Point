@extends('layouts.public.doctorPortal')

@section('styles')
<style>
    .sidebar {
        background-color: #223a66;
    }
    .btn-primary {
        background-color: #e12454;
        color: white;
    }
    .btn-primary:hover {
        background-color: #c01e48;
    }
    .badge-pending {
        background-color: #f59e0b;
        color: white;
    }
    .badge-confirmed {
        background-color: #10b981;
        color: white;
    }
    .badge-cancelled {
        background-color: #ef4444;
        color: white;
    }
    .badge-completed {
        background-color: #3b82f6;
        color: white;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        border-radius: 4px;
    }
    .dropdown-content a {
        color: black;
        padding: 8px 12px;
        text-decoration: none;
        display: block;
    }
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .action-btn {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        cursor: pointer;
    }
    .edit-btn {
        background-color: #3b82f6;
        color: white;
        border: none;
    }
    .edit-btn:hover {
        background-color: #2563eb;
    }
    .cancel-btn {
        background-color: #ef4444;
        color: white;
        border: none;
    }
    .cancel-btn:hover {
        background-color: #dc2626;
    }
    .confirm-btn {
        background-color: #10b981;
        color: white;
        border: none;
    }
    .confirm-btn:hover {
        background-color: #059669;
    }
    .inline-form {
        display: inline-block;
    }
    .day-badge {
        display: inline-block;
        background-color: #1a365d;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-size: 0.75rem;
        margin-right: 0.25rem;
        margin-bottom: 0.25rem;
    }
    .working-hours {
        font-size: 0.875rem;
        color: #cbd5e0;
        margin-top: 0.5rem;
    }
</style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-0 py-8">
    <div class="flex flex-col md:flex-row gap-4">
        <!-- Doctor Profile Sidebar -->
        <div class="md:w-1/3 lg:w-1/4">
            <div class="sidebar rounded-lg shadow-lg overflow-hidden text-white">
                <!-- Profile Header -->
                <div class="bg-[#1a2d52] p-6 text-center">
                    <div class="relative inline-block">
                        @isset($doctor->image)
                        <img src="{{ asset('storage/'.$doctor->image) }}" alt="Profile Photo"
                             class="w-32 h-32 rounded-full object-cover border-4 border-[#e12454] mx-auto">
                        @else
                        <div class="w-32 h-32 rounded-full bg-gray-200 border-4 border-[#e12454] mx-auto flex items-center justify-center text-4xl font-bold text-gray-600">
                            {{ substr($doctor->name, 0, 1) }}
                        </div>
                        @endisset
                        <span class="absolute bottom-0 right-0 bg-green-500 rounded-full w-4 h-4 border-2 border-white"></span>
                    </div>
                    <h2 class="text-xl font-bold mt-4">{{ $doctor->name ?? 'Doctor Name' }}</h2>
                    @isset($doctor->specialization)
                    <p class="text-blue-200">{{ $doctor->specialization->name }}</p>
                    @endisset
                </div>

                <!-- Profile Details -->
                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="text-sm font-semibold text-blue-300 uppercase tracking-wider">Contact Information</h3>
                        <ul class="mt-2 space-y-2">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-blue-200 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $doctor->email ?? 'N/A' }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-blue-200 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>{{ $doctor->phone ?? 'N/A' }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-blue-200 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>
                                    @isset($doctor->address){{ $doctor->address }}@endisset
                                    @isset($doctor->governorate), {{ $doctor->governorate }}@endisset
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-sm font-semibold text-blue-300 uppercase tracking-wider">Professional Details</h3>
                        <ul class="mt-2 space-y-2">
                            <li class="flex justify-between">
                                <span class="text-blue-100">Experience:</span>
                                <span>{{ $doctor->experience_years ?? '0' }} years</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-blue-100">Fee:</span>
                                <span>{{ $doctor->price_per_appointment ?? '0' }} JOD</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-blue-100">Status:</span>
                                <span class="capitalize">{{ $doctor->status ?? 'active' }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-sm font-semibold text-blue-300 uppercase tracking-wider">Availability</h3>
                        <div class="mt-2">
                            @php
                                $days = [
                                    'monday' => 'Monday',
                                    'tuesday' => 'Tuesday',
                                    'wednesday' => 'Wednesday',
                                    'thursday' => 'Thursday',
                                    'friday' => 'Friday',
                                    'saturday' => 'Saturday',
                                    'sunday' => 'Sunday'
                                ];
                                $hasAvailability = false;
                            @endphp

                            @foreach($days as $key => $day)
                                @if($doctor->$key)
                                    <span class="day-badge">{{ $day }}</span>
                                    @php $hasAvailability = true; @endphp
                                @endif
                            @endforeach

                            @if(!$hasAvailability)
                                <p class="text-sm text-blue-100">No availability set</p>
                            @endif
                        </div>
                        @if($doctor->working_hours_start && $doctor->working_hours_end)
                            <div class="working-hours">
                                Working Hours: {{ \Carbon\Carbon::parse($doctor->working_hours_start)->format('h:i A') }} -
                                {{ \Carbon\Carbon::parse($doctor->working_hours_end)->format('h:i A') }}
                            </div>
                        @endif
                    </div>

                    {{-- <div class="mt-6">
                        <a href="{{ route('doctor.profile.edit') }}" class="btn-primary w-full py-2 px-4 rounded-md font-medium text-center block">
                            Edit Profile
                        </a>
                    </div> --}}
                </div>
            </div>

            <!-- Quick2 Stats -->
            <div class="bg-white rounded-lg shadow-lg mt-6 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Stats</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-blue-50 p-3 rounded-lg">
                        <p class="text-2xl font-bold text-[#223a66]">{{ $total_appointments ?? 0 }}</p>
                        <p class="text-xs text-gray-600">Total Appointments</p>
                    </div>
                    <div class="bg-green-50 p-3 rounded-lg">
                        <p class="text-2xl font-bold text-green-600">{{ $completed_appointments ?? 0 }}</p>
                        <p class="text-xs text-gray-600">Confirmed</p>
                    </div>
                    <div class="bg-yellow-50 p-3 rounded-lg">
                        <p class="text-2xl font-bold text-yellow-600">{{ $pending_appointments ?? 0 }}</p>
                        <p class="text-xs text-gray-600">Pending</p>
                    </div>
                    <div class="bg-red-50 p-3 rounded-lg">
                        <p class="text-2xl font-bold text-red-600">{{ $canceled_appointments ?? 0 }}</p>
                        <p class="text-xs text-gray-600">Canceled</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content - Appointments -->
        <div class="md:w-2/3 lg:w-3/4">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Appointments Header -->
                <div class="border-b border-gray-200 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-gray-800">Appointments</h2>
                        <div class="flex space-x-2">
                            <button class="btn-primary px-4 py-2 rounded-md text-sm">
                                + New Appointment
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Appointments Content -->
                <div class="p-6">
                    <!-- Upcoming Appointments Table -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Upcoming Appointments</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Patient
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date & Time
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @isset($upcomingAppointments)
                                        @foreach($upcomingAppointments as $appointment)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        @isset($appointment->patient)
                                                        <img class="h-10 w-10 rounded-full" src="{{ $appointment->patient->image_url ?? 'https://ui-avatars.com/api/?name='.urlencode($appointment->patient->name).'&color=223a66&background=e12454' }}" alt="">
                                                        @endisset
                                                    </div>
                                                    <div class="ml-4">
                                                        @isset($appointment->patient)
                                                        <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->name }}</div>
                                                        <div class="text-sm text-gray-500">{{ $appointment->patient->email }}</div>
                                                        @endisset
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @isset($appointment->appointment_date)
                                                <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</div>
                                                @endisset
                                                @isset($appointment->appointment_time)
                                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</div>
                                                @endisset
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @isset($appointment->status)
                                                <span class="px-2 py-1 text-xs rounded-full badge-{{ $appointment->status }}">
                                                    {{ ucfirst($appointment->status) }}
                                                </span>
                                                @endisset
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <div class="flex space-x-2">
                                                    @if($appointment->status == 'pending')
                                                        <form method="POST" action="{{ route('doctor.appointments.update', ['appointmentId' => $appointment->id]) }}" class="inline-form">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="confirmed">
                                                            <button type="submit" class="confirm-btn action-btn">
                                                                Confirm
                                                            </button>
                                                        </form>
                                                        <form method="POST" action="{{ route('doctor.appointments.update', ['appointmentId' => $appointment->id]) }}" class="inline-form">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="canceled">
                                                            <button type="submit" class="cancel-btn action-btn">
                                                                Cancel
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($appointment->status == 'confirmed')
                                                        <form method="POST" action="{{ route('doctor.appointments.update', ['appointmentId' => $appointment->id]) }}" class="inline-form">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="canceled">
                                                            <button type="submit" class="cancel-btn action-btn">
                                                                Cancel
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($appointment->status == 'canceled')
                                                        <form method="POST" action="{{ route('doctor.appointments.update', ['appointmentId' => $appointment->id]) }}" class="inline-form">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="confirmed">
                                                            <button type="submit" class="confirm-btn action-btn">
                                                                Re-confirm
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                                No upcoming appointments found
                                            </td>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                        @isset($upcomingAppointments)
                        <div class="mt-4">
                            {{ $upcomingAppointments->links() }}
                        </div>
                        @endisset
                    </div>

                    <!-- Recent Appointments Table -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Appointments</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Patient
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date & Time
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @isset($recentAppointments)
                                        @foreach($recentAppointments as $appointment)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        @isset($appointment->patient)
                                                        <img class="h-10 w-10 rounded-full" src="{{ $appointment->patient->image_url ?? 'https://ui-avatars.com/api/?name='.urlencode($appointment->patient->name).'&color=223a66&background=e12454' }}" alt="">
                                                        @endisset
                                                    </div>
                                                    <div class="ml-4">
                                                        @isset($appointment->patient)
                                                        <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->name }}</div>
                                                        <div class="text-sm text-gray-500">{{ $appointment->patient->email }}</div>
                                                        @endisset
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @isset($appointment->appointment_date)
                                                <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</div>
                                                @endisset
                                                @isset($appointment->appointment_time)
                                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</div>
                                                @endisset
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @isset($appointment->status)
                                                <span class="px-2 py-1 text-xs rounded-full badge-{{ $appointment->status }}">
                                                    {{ ucfirst($appointment->status) }}
                                                </span>
                                                @endisset
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <div class="flex space-x-2">
                                                    <a href="#" class="text-[#e12454] hover:text-[#c01e48] mr-3">View</a>
                                                    <a href="#" class="text-[#223a66] hover:text-[#1a2d52]">Notes</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                                No recent appointments found
                                            </td>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                        @isset($recentAppointments)
                        <div class="mt-4">
                            {{ $recentAppointments->links() }}
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // You can add any JavaScript functionality here if needed
    });
</script>
@endsection
