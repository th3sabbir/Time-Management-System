@extends('layouts.app')
@section('title', 'Edit Work Type')
@section('content')
<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-pen me-2 text-primary"></i>Edit Work Type</h4>
        <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('work_types.index') }}" class="text-decoration-none text-muted">Work Types</a> &rsaquo; Edit</p>
    </div>
</div>
{!! Form::model($work_type, ['method'=>'PUT','route'=>['work_types.update',$work_type->id]]) !!}
<div class="card" style="max-width:560px;">
    <div class="card-header"><i class="fa-solid fa-layer-group me-2 text-primary"></i>Work Type Details</div>
    <div class="card-body">
        <div class="mb-3">
            {!! Form::label('name', 'Name *', ['class'=>'form-label']) !!}
            {!! Form::text('name', old('name', $work_type->name), ['class'=>'form-control']) !!}
            @error('name')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
        </div>
    </div>
</div>
<div class="mt-3 d-flex gap-2">
    {!! Form::submit('Update Work Type', ['class'=>'btn btn-primary']) !!}
    <a href="{{ route('work_types.index') }}" class="btn btn-secondary">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
