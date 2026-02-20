@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-gauge me-2 text-primary"></i>Dashboard</h4>
        <p class="text-muted mb-0" style="font-size:13px;">Welcome back, {{ auth()->user()->name ?? 'User' }}</p>
    </div>
    <a href="{{ route('time_entries.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i>Log Time
    </a>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card indigo">
            <i class="fa-solid fa-stopwatch stat-icon"></i>
            <div class="stat-value">{{ $time_entries_count ?? '—' }}</div>
            <div class="stat-label">Time Entries</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card teal">
            <i class="fa-solid fa-briefcase stat-icon"></i>
            <div class="stat-value">{{ $projects_count ?? '—' }}</div>
            <div class="stat-label">Projects</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card amber">
            <i class="fa-solid fa-layer-group stat-icon"></i>
            <div class="stat-value">{{ $work_types_count ?? '—' }}</div>
            <div class="stat-label">Work Types</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card pink">
            <i class="fa-solid fa-users stat-icon"></i>
            <div class="stat-value">{{ $users_count ?? '—' }}</div>
            <div class="stat-label">Total Users</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                <span><i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i>Quick Links</span>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('time_entries.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Log New Time Entry</a>
                    <a href="{{ route('time_entries.index') }}" class="btn btn-secondary"><i class="fa-solid fa-list me-2"></i>View All Time Entries</a>
                    <a href="{{ route('reports.index') }}" class="btn btn-info"><i class="fa-solid fa-chart-bar me-2"></i>View Reports</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                <span><i class="fa-solid fa-circle-info me-2 text-primary"></i>System Info</span>
            </div>
            <div class="card-body">
                <table class="table table-sm mb-0">
                    <tr><td class="text-muted">Application</td><td class="fw-600">TrackTime</td></tr>
                    <tr><td class="text-muted">Framework</td><td class="fw-600">Laravel {{ app()->version() }}</td></tr>
                    <tr><td class="text-muted">PHP</td><td class="fw-600">{{ PHP_VERSION }}</td></tr>
                    <tr><td class="text-muted">Logged In As</td><td class="fw-600">{{ auth()->user()->name ?? '' }}</td></tr>
                    <tr><td class="text-muted">Role</td><td><span class="badge bg-primary">{{ auth()->user()->role->title ?? 'N/A' }}</span></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
