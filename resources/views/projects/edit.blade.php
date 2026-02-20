@extends('layouts.app')
@section('title', 'Edit Project')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-pen me-2 text-primary"></i>Edit Project</h4>
        <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('projects.index') }}" class="text-decoration-none text-muted">Projects</a> &rsaquo; Edit</p>
    </div>
</div>

{!! Form::model($project, ['method'=>'PUT','route'=>['projects.update',$project->id]]) !!}
<div class="card" style="max-width:560px;">
    <div class="card-header"><i class="fa-solid fa-briefcase me-2 text-primary"></i>Project Details</div>
    <div class="card-body">
        <div class="mb-3">
            {!! Form::label('name', 'Project Name *', ['class'=>'form-label']) !!}
            {!! Form::text('name', old('name', $project->name), ['class'=>'form-control','placeholder'=>'Enter project name']) !!}
            @error('name')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
        </div>
    </div>
</div>
<div class="mt-3 d-flex gap-2">
    {!! Form::submit('Update Project', ['class'=>'btn btn-primary']) !!}
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
