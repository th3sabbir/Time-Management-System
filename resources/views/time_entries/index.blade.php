@extends('layouts.app')
@section('title', 'Time Entries')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-stopwatch me-2 text-primary"></i>Time Entries</h4>
        <p class="text-muted mb-0" style="font-size:13px;">Track and manage your logged time</p>
    </div>
    <div class="d-flex gap-2">
        <button id="btn-mass-delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash me-1"></i>Delete Selected</button>
        <a href="{{ route('time_entries.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i>Add New</a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0 {{ count($time_entries) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th style="width:40px;"><input type="checkbox" id="select-all"></th>
                        <th>Project</th>
                        <th>Work Type</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($time_entries as $entry)
                    <tr data-entry-id="{{ $entry->id }}">
                        <td><input type="checkbox" name="ids[]" value="{{ $entry->id }}"></td>
                        <td><span class="fw-500">{{ optional($entry->project)->name ?? '—' }}</span></td>
                        <td><span class="badge bg-indigo text-white" style="background:#6366f1;">{{ optional($entry->work_type)->name ?? '—' }}</span></td>
                        <td><i class="fa-regular fa-clock text-muted me-1"></i>{{ $entry->start_time }}</td>
                        <td><i class="fa-regular fa-clock text-muted me-1"></i>{{ $entry->end_time }}</td>
                        <td class="text-end table-actions">
                            <a href="{{ route('time_entries.show', $entry->id) }}" class="btn btn-xs btn-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('time_entries.edit', $entry->id) }}" class="btn btn-xs btn-info"><i class="fa-solid fa-pen"></i></a>
                            {!! Form::open(['method'=>'DELETE','route'=>['time_entries.destroy',$entry->id],'onsubmit'=>"return confirm('Delete this entry?')",'style'=>'display:inline']) !!}
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa-solid fa-trash"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-muted py-4"><i class="fa-solid fa-inbox me-2"></i>No time entries found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>window.route_mass_crud_entries_destroy='{{ route("time_entries.mass_destroy") }}';</script>
@endsection
