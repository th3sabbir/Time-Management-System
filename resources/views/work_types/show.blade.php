@extends('layouts.app')
@section('title', 'Work Type Details')
@section('content')
<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-layer-group me-2 text-primary"></i>{{ $work_type->name }}</h4>
        <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('work_types.index') }}" class="text-decoration-none text-muted">Work Types</a> &rsaquo; View</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('work_types.edit', $work_type->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen me-1"></i>Edit</a>
        <a href="{{ route('work_types.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
    </div>
</div>
<div class="card" style="max-width:500px;">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-4 text-muted">Name</dt>
            <dd class="col-sm-8">{{ $work_type->name }}</dd>
        </dl>
    </div>
</div>
@endsection
