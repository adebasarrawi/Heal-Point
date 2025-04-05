@extends('layouts.admin.app')

@section('header')
Subscriptions
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.style.css') }}">

<div class="container">
    <!-- Search Bar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form action="{{ route('subscriptions.index') }}" method="GET" class="w-75 me-2">
            <div class="input-group">
                <input type="text" name="search" class="form-control" 
                       placeholder="Search by doctor name, status, or dates" 
                       value="{{ request('search') }}">
                       <button type="submit" class="btn" style="background-color: #223a66; color: white;">Search</button>
                @if(request('search'))
                    <a href="{{ route('subscriptions.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <table class="dashboard-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Doctor Name</th>
                <th>Subscription Start Date</th>
                <th>Subscription End Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subscription->doctor->name ?? 'Not Available' }}</td>
                    <td>{{ $subscription->start_date }}</td>
                    <td>{{ $subscription->end_date }}</td>
                    <td>{{ $subscription->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination with search preservation -->
<div class="mt-4 d-flex justify-content-center">
    {{ $subscriptions->appends(['search' => request('search')])->links() }}
</div>

@endsection