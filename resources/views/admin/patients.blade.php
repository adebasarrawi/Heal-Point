@extends('layouts.admin.app')

@section('header')
Patients
@endsection

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <form action="{{ route('patients.index') }}" method="GET" class="w-75 me-2">
        <div class="input-group">
            <input type="text" name="search" class="form-control" 
                   placeholder="Search by name or phone number" 
                   value="{{ request('search') }}">
                   <button type="submit" class="btn" style="background-color: #223a66; color: white;">Search</button>
            @if(request('search'))
                <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">Reset</a>
            @endif
        </div>
    </form>
</div>

<!-- Add this line to include the CSS -->
<link rel="stylesheet" href="{{ asset('css/dashboard.style.css') }}">

<div class="container">
    <table class="dashboard-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->phone }}</td>
                </tr>               
            @endforeach
        </tbody>
    </table>
    <div class="mt-4 d-flex justify-content-center">
        {{ $patients->links() }}
    </div>
</div>

@endsection