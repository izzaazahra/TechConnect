@extends('Layouts.admin')

@section('content')
<div class="header">
    <h1>Dashboard</h1>
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <span>{{ Auth::user()->name }}</span>
    </div>
</div>

    <div class="card-container">
        <div class="card">
            <h3>Total Users</h3>
            <p>{{ $userCount }}</p>
        </div>

        <div class="card">
            <h3>Total Courses</h3>
            <p>{{ $courseCount }}</p>
        </div>
    </div>
@endsection
