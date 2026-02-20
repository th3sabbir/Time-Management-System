@extends('layouts.app')
@section('title', 'Edit Time Entry')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-pen me-2 text-primary"></i>Edit Time Entry</h4>
        <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('time_entries.index') }}" class="text-decoration-none text-muted">Time Entries</a> &rsaquo; Edit</p>
    </div>
</div>

{!! Form::model($time_entry, ['method'=>'PUT','route'=>['time_entries.update',$time_entry->id]]) !!}
<div class="row g-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><i class="fa-solid fa-briefcase me-2 text-primary"></i>Project & Work Type</div>
            <div class="card-body">
                <div class="mb-3">
                    {!! Form::label('project_id', 'Project *', ['class'=>'form-label']) !!}
                    {!! Form::select('project_id', $projects, old('project_id', $time_entry->project_id), ['class'=>'form-select']) !!}
                    @error('project_id')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    {!! Form::label('work_type_id', 'Work Type *', ['class'=>'form-label']) !!}
                    {!! Form::select('work_type_id', $work_types, old('work_type_id', $time_entry->work_type_id), ['class'=>'form-select']) !!}
                    @error('work_type_id')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><i class="fa-solid fa-clock me-2 text-primary"></i>Time Range</div>
            <div class="card-body">
                <div class="mb-3">
                    {!! Form::label('start_time', 'Start Time *', ['class'=>'form-label']) !!}
                    {!! Form::text('start_time', old('start_time', $time_entry->start_time), ['class'=>'form-control flatpickr-dt']) !!}
                    @error('start_time')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    {!! Form::label('end_time', 'End Time *', ['class'=>'form-label']) !!}
                    {!! Form::text('end_time', old('end_time', $time_entry->end_time), ['class'=>'form-control flatpickr-dt']) !!}
                    @error('end_time')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-3 d-flex gap-2">
    {!! Form::submit('Update Entry', ['class'=>'btn btn-primary']) !!}
    <a href="{{ route('time_entries.index') }}" class="btn btn-secondary">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
@section('javascript')
<script>flatpickr('.flatpickr-dt',{enableTime:true,dateFormat:'Y-m-d H:i:S'});</script>
@endsection
