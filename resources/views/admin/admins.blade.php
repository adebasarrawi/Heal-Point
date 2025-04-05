@extends('layouts.admin.app')

@section('header')
Admins
@endsection

@section('content')

<!-- Add this line to include the CSS -->
<link rel="stylesheet" href="{{ asset('css/dashboard.style.css') }}">


<!-- Button to Trigger the Modal -->
<div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn" style="background-color: #e12454; color: white;" data-bs-toggle="modal" data-bs-target="#addAdminModal">
        Add Admin
    </button>
</div>

<!-- Add Admin Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admins.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                    </div>

                    <!-- Permissions -->
                    <div class="mb-3">
                        <label for="permissions" class="form-label">Permissions</label>
                        <select class="form-select" id="permissions" name="permissions[]" multiple required>
                            <option value="manage_users">Manage Users</option>
                            <option value="manage_doctors">Manage Doctors</option>
                            <option value="manage_appointments">Manage Appointments</option>
                            <option value="manage_settings">Manage Settings</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <table class="dashboard-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                {{-- <th>Permissions</th>
                <th>Created At</th>
                <th>Updated At</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->phone }}</td>
                    {{-- <td>{{ $admin->permissions }}</td>
                    <td>{{ $admin->created_at }}</td>
                    <td>{{ $admin->updated_at }}</td> --}}
                    <td>
                        <div class="d-flex gap-2">
                            <!-- Edit Button (triggers modal) -->
                            <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#editModal-{{ $admin->id }}">
                                Edit
                            </button>

                            <!-- Delete Button (triggers modal) -->
                            <button type="button" class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $admin->id }}">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Edit Form Modal -->
                <div class="modal fade" id="editModal-{{ $admin->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $admin->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel-{{ $admin->id }}">Edit Admin: {{ $admin->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admins.update', $admin->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name-{{ $admin->id }}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name-{{ $admin->id }}" name="name" value="{{ $admin->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email-{{ $admin->id }}" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email-{{ $admin->id }}" name="email" value="{{ $admin->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone-{{ $admin->id }}" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone-{{ $admin->id }}" name="phone" value="{{ $admin->phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="permissions-{{ $admin->id }}" class="form-label">Permissions</label>
                                        <select class="form-select" id="permissions-{{ $admin->id }}" name="permissions" multiple>
                                            <!-- Add your permission options here -->
                                            <option value="manage_users" {{ str_contains($admin->permissions, 'manage_users') ? 'selected' : '' }}>Manage Users</option>
                                            <option value="manage_content" {{ str_contains($admin->permissions, 'manage_content') ? 'selected' : '' }}>Manage Content</option>
                                            <option value="manage_settings" {{ str_contains($admin->permissions, 'manage_settings') ? 'selected' : '' }}>Manage Settings</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteModal-{{ $admin->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $admin->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel-{{ $admin->id }}">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete admin "{{ $admin->name }}" ({{ $admin->email }})? This action cannot be undone.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4 d-flex justify-content-center">
        {{ $admins->links() }}
    </div>
</div>



<!-- Add this to initialize select2 if you're using it for permissions multiselect -->
@push('scripts')
<script>
    $(document).ready(function() {
        $('select[name="permissions"]').select2({
            theme: 'bootstrap-5',
            placeholder: 'Select permissions',
            allowClear: true
        });
    });
</script>
@endpush

@endsection
