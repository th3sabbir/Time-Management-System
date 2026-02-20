@extends('layouts.app')
@section('title', 'Project Details')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-briefcase me-2 text-primary"></i>{{ $project->name }}</h4>
        <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('projects.index') }}" class="text-decoration-none text-muted">Projects</a> &rsaquo; View</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen me-1"></i>Edit</a>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
    </div>
</div>

<div class="card" style="max-width:500px;">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-4 text-muted fw-500">Project Name</dt>
            <dd class="col-sm-8">{{ $project->name }}</dd>
        </dl>
    </div>
</div>
@endsection
