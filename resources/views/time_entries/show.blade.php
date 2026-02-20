@extends('layouts.app')
@section('title', 'Time Entry Details')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-stopwatch me-2 text-primary"></i>Time Entry Details</h4>
        <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('time_entries.index') }}" class="text-decoration-none text-muted">Time Entries</a> &rsaquo; View</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('time_entries.edit', $time_entry->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen me-1"></i>Edit</a>
        <a href="{{ route('time_entries.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
    </div>
</div>

<div class="card" style="max-width:600px;">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-4 text-muted fw-500">Project</dt>
            <dd class="col-sm-8">{{ optional($time_entry->project)->name ?? '—' }}</dd>
            <dt class="col-sm-4 text-muted fw-500">Work Type</dt>
            <dd class="col-sm-8"><span class="badge" style="background:#6366f1;">{{ optional($time_entry->work_type)->name ?? '—' }}</span></dd>
            <dt class="col-sm-4 text-muted fw-500">Start Time</dt>
            <dd class="col-sm-8">{{ $time_entry->start_time }}</dd>
            <dt class="col-sm-4 text-muted fw-500">End Time</dt>
            <dd class="col-sm-8">{{ $time_entry->end_time }}</dd>
        </dl>
    </div>
</div>
@endsection
