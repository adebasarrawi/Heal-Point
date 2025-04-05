<x-app-layout>
    <!-- Profile Section -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <!-- Left Side - User Info Card (unchanged) -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="bg-white p-6 rounded-xl shadow">
                        <div class="text-center">
                            <div class="relative inline-block">
                                @if(auth()->user()->image)
                                    <img src="{{ asset('storage/' . auth()->user()->image) }}"
                                        class="rounded-full h-32 w-32 border-4 border-white shadow-md"
                                        alt="User profile">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}"
                                    class="rounded-full h-32 w-32 border-4 border-white shadow-md"
                                    alt="User profile">
                                @endif

                                <button class="absolute bottom-0 right-0  text-white p-2 rounded-full btn-main transition">
                                    <i class="icofont-camera"></i>
                                </button>
                            </div>

                            <h2 class="mt-4 text-md font-medium text-gray-900">{{ Auth::user()->name }}</h2>
                            <p class="text-sm text-gray-600">Patient</p>

                            <button class="mt-4 px-4 py-2   rounded-md btn-main text-white transition">
                                <a href="{{ route('profile.edit') }}" class="inline-flex text-white items-center">
                                    <i class="icofont-edit mr-2"></i>Edit Profile
                                </a>
                            </button>

                            <hr class="my-4 border-gray-200">

                            <div class="space-y-3 text-left">
                                <div class="flex items-center">
                                    <i class="icofont-phone text-gray-500 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Phone</p>
                                        <p class="text-sm text-gray-600">{{ Auth::user()->phone }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <i class="icofont-email text-gray-500 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Email</p>
                                        <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <i class="icofont-user-alt-3 text-gray-500 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Age</p>
                                        <p class="text-sm text-gray-600">32</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <i class="icofont-location-pin text-gray-500 mr-3"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Address</p>
                                        <p class="text-sm text-gray-600">123 Medical St, Amman</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Content Tabs -->
                <div class="col-lg-8">
                    <div class="bg-white rounded-xl shadow">
                        <!-- Tab Navigation -->
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8 overflow-x-auto">
                                <button onclick="switchTab('appointments')" id="appointmentsTab" class="border-b-2 border-transparent whitespace-nowrap px-4 py-3 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                    <i class="icofont-calendar mr-2"></i>Appointments
                                </button>
                                <button onclick="switchTab('doctors')" id="doctorsTab" class="border-b-2 border-transparent whitespace-nowrap px-4 py-3 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                                    <i class="icofont-user-md mr-2"></i>My Doctors
                                </button>
                            </nav>
                        </div>

                        <!-- Appointments Content -->
                        <div id="appointmentsContent" class="p-6">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                                <h3 class="text-md font-medium text-gray-900 mb-2 sm:mb-0">Upcoming Appointments</h3>
                                <button class="btn btn-main btn-sm">
                                    <i class="icofont-plus mr-1"></i> Book New Appointment
                                </button>
                            </div>

                            <!-- Appointments List -->
                            <div class="space-y-4">
                                <!-- Appointment Card 1 -->
                                <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                    <div class="p-4">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div class="flex items-start mb-3 md:mb-0">
                                                <img src="/images/team/1.jpg"
                                                     class="rounded-full h-12 w-12 border-2 border-white shadow mr-4"
                                                     alt="Doctor">
                                                <div>
                                                    <h4 class="font-medium text-gray-900">Dr. Sarah Johnson</h4>
                                                    <p class="text-sm text-gray-600">Cardiologist</p>
                                                    <div class="flex items-center mt-1">
                                                        <i class="icofont-location-pin text-gray-500 text-xs mr-1"></i>
                                                        <span class="text-xs text-gray-500">Royal Hospital, Amman</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                                <div class="text-center sm:text-right">
                                                    <p class="text-sm font-medium text-gray-900">Tomorrow</p>
                                                    <p class="text-sm text-gray-600">10:00 AM - 10:30 AM</p>
                                                </div>
                                                <div class="flex gap-2 mt-2 sm:mt-0">
                                                    <button class="btn btn-outline-primary btn-sm">
                                                        <i class="icofont-ui-calendar mr-1"></i> Reschedule
                                                    </button>
                                                    <button class="btn btn-outline-danger btn-sm">
                                                        <i class="icofont-ui-close mr-1"></i> Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Appointment Card 2 -->
                                <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                    <div class="p-4">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div class="flex items-start mb-3 md:mb-0">
                                                <img src="/images/team/1.jpg"
                                                     class="rounded-full h-12 w-12 border-2 border-white shadow mr-4"
                                                     alt="Doctor">
                                                <div>
                                                    <h4 class="font-medium text-gray-900">Dr. Michael Brown</h4>
                                                    <p class="text-sm text-gray-600">Dentist</p>
                                                    <div class="flex items-center mt-1">
                                                        <i class="icofont-location-pin text-gray-500 text-xs mr-1"></i>
                                                        <span class="text-xs text-gray-500">Smile Dental Clinic, Amman</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                                <div class="text-center sm:text-right">
                                                    <p class="text-sm font-medium text-gray-900">June 15, 2023</p>
                                                    <p class="text-sm text-gray-600">2:00 PM - 2:45 PM</p>
                                                </div>
                                                <div class="flex gap-2 mt-2 sm:mt-0">
                                                    <button class="btn btn-outline-primary btn-sm">
                                                        <i class="icofont-ui-calendar mr-1"></i> Reschedule
                                                    </button>
                                                    <button class="btn btn-outline-danger btn-sm">
                                                        <i class="icofont-ui-close mr-1"></i> Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Past Appointments -->
                            <h3 class="text-md font-medium text-gray-900 mt-8 mb-4">Past Appointments</h3>
                            <div class="space-y-4">
                                <!-- Past Appointment Card -->
                                <div class="border rounded-lg overflow-hidden bg-gray-50">
                                    <div class="p-4">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div class="flex items-start mb-3 md:mb-0">
                                                <img src="/images/team/1.jpg"
                                                     class="rounded-full h-12 w-12 border-2 border-white shadow mr-4"
                                                     alt="Doctor">
                                                <div>
                                                    <h4 class="font-medium text-gray-900">Dr. Lisa Wilson</h4>
                                                    <p class="text-sm text-gray-600">Dermatologist</p>
                                                    <div class="flex items-center mt-1">
                                                        <i class="icofont-location-pin text-gray-500 text-xs mr-1"></i>
                                                        <span class="text-xs text-gray-500">Skin Care Center, Amman</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                                <div class="text-center sm:text-right">
                                                    <p class="text-sm font-medium text-gray-900">May 20, 2023</p>
                                                    <p class="text-sm text-gray-600">Completed</p>
                                                </div>
                                                <button class="btn btn-outline-primary btn-sm mt-2 sm:mt-0">
                                                    <i class="icofont-file-document mr-1"></i> View Details
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Doctors Content (hidden by default) -->
                        <div id="doctorsContent" class="p-6 hidden">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-md font-medium text-gray-900">My Doctors</h3>
                                <button class="btn btn-main btn-sm">
                                    <i class="icofont-search mr-1"></i> Find New Doctor
                                </button>
                            </div>

                            <!-- Doctors Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Doctor Card 1 -->
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start">
                                        <img src="/images/team/1.jpg"
                                             class="rounded-full h-16 w-16 border-2 border-white shadow mr-4"
                                             alt="Doctor">
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-900">Dr. Sarah Johnson</h4>
                                            <p class="text-sm text-gray-600 mb-2">Cardiologist</p>
                                            <div class="flex items-center text-sm text-gray-600 mb-3">
                                                <i class="icofont-location-pin mr-1"></i>
                                                <span>Royal Hospital, Amman</span>
                                            </div>
                                            <div class="flex gap-2">

                                                <button class="btn btn-main btn-sm flex-1">
                                                    <i class="icofont-calendar mr-1"></i> Book
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Doctor Card 2 -->
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start">
                                        <img src="/images/team/1.jpg"
                                             class="rounded-full h-16 w-16 border-2 border-white shadow mr-4"
                                             alt="Doctor">
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-900">Dr. Michael Brown</h4>
                                            <p class="text-sm text-gray-600 mb-2">Dentist</p>

                                            <div class="flex items-center text-sm text-gray-600 mb-3">
                                                <i class="icofont-location-pin mr-1"></i>
                                                <span>Smile Dental Clinic, Amman</span>
                                            </div>
                                            <div class="flex gap-2">

                                                <button class="btn btn-main btn-sm flex-1">
                                                    <i class="icofont-calendar mr-1"></i> Book
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Tab switching functionality
        function switchTab(tabName) {
            // Hide all content
            document.getElementById('appointmentsContent').classList.add('hidden');
            document.getElementById('doctorsContent').classList.add('hidden');

            // Remove active class from all tabs
            document.getElementById('appointmentsTab').classList.remove('border-red-500', 'text-red-600');
            document.getElementById('doctorsTab').classList.remove('border-red-500', 'text-red-600');

            // Show selected content and mark tab as active
            document.getElementById(tabName + 'Content').classList.remove('hidden');
            document.getElementById(tabName + 'Tab').classList.add('border-red-500', 'text-red-600');
        }

        // Initialize with Appointments tab active
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('appointmentsTab').classList.add('border-red-500', 'text-red-600');
        });
    </script>

</x-app-layout>
