<x-app-layout>
    <!-- Doctors Listing Section -->
    <section class="pt-4 doctors-section gray-bg">
        <div class="container">
            <!-- Search Section -->
            <div class="search-section mb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="search-card p-4">
                            <form class="appointment-form" action="{{ route('doctors') }}" method="GET">
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <input type="text" name="search" class="form-control" placeholder="Search by doctor name or specialty" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-5">
                                        <select name="governorate" class="appointment-select">
                                            <option value="">Select Governorate</option>
                                            <option value="Amman" {{ request('governorate') == 'Amman' ? 'selected' : '' }}>Amman</option>
                                            <option value="Irbid" {{ request('governorate') == 'Irbid' ? 'selected' : '' }}>Irbid</option>
                                            <option value="Ajloun" {{ request('governorate') == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
                                            <option value="Aqaba" {{ request('governorate') == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
                                            <option value="Balqa" {{ request('governorate') == 'Balqa' ? 'selected' : '' }}>Balqa</option>
                                            <option value="Zarqa" {{ request('governorate') == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
                                            <option value="Mafraq" {{ request('governorate') == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
                                            <option value="Maan" {{ request('governorate') == 'Maan' ? 'selected' : '' }}>Maan</option>
                                            <option value="Tafilah" {{ request('governorate') == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
                                            <option value="Karak" {{ request('governorate') == 'Karak' ? 'selected' : '' }}>Karak</option>
                                            <option value="Jerash" {{ request('governorate') == 'Jerash' ? 'selected' : '' }}>Jerash</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-main w-100">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Filters Column -->
                <div class="col-lg-3">
                    <div class="filter-section mb-4">
                        <h4 class="text-capitalize mb-3">Filters</h4>
                        <div class="divider mb-4"></div>

                        <!-- Specialty Filter -->
                        <form action="{{ route('doctors') }}" method="GET" id="filter-form">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="governorate" value="{{ request('governorate') }}">

                            <div class="filter-group mb-4">
                                <h5 class="text-capitalize mb-3">Specialty</h5>
                                @foreach($specializations as $specialization)
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox"
                                        name="specializations[]"
                                        value="{{ $specialization->id }}"
                                        id="spec-{{ $specialization->id }}"
                                        @if(request()->has('specializations') && in_array($specialization->id, request('specializations'))) checked @endif>
                                    <label class="form-check-label" for="spec-{{ $specialization->id }}">
                                        {{ $specialization->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-main btn-round-full w-100">Apply Filters</button>
                        </form>
                    </div>
                </div>

                <!-- Doctors List -->
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="section-title mb-0">Available Doctors</h4>
                        <div>
                            <select class="appointment-select" id="sort-select" name="sort">
                                <option value="recommended" {{ request('sort') == 'recommended' ? 'selected' : '' }}>Sort by: Recommended</option>
                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                                <option value="experience" {{ request('sort') == 'experience' ? 'selected' : '' }}>Most Experienced</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        @forelse($doctors as $doctor)
                        <!-- Doctor Card -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="doctor-card">
                                <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : asset('images/team/default.jpg') }}" class="doctor-image" alt="{{ $doctor->name }}">
                                <div class="doctor-info">
                                    <h5 class="doctor-name">Dr. {{ $doctor->name }}</h5>
                                    <p class="doctor-specialty">{{ $doctor->specialization ? $doctor->specialization->name : 'General' }}</p>
                                    <p class="text-muted mb-3">
                                        <i class="icofont-location-pin"></i> {{ $doctor->address }}, {{ $doctor->governorate }}
                                    </p>
                                    <a href="{{ route('doctor', $doctor->id) }}" class="btn btn-main btn-round-full btn-sm w-100">View Profile</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                No doctors found matching your criteria. Please try different search parameters.
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $doctors->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle sort selection
            const sortSelect = document.getElementById('sort-select');
            if(sortSelect) {
                sortSelect.addEventListener('change', function() {
                    const currentUrl = new URL(window.location);
                    currentUrl.searchParams.set('sort', this.value);
                    window.location.href = currentUrl.toString();
                });
            }
        });
    </script>
</x-app-layout>
