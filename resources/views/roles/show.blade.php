@extends('layouts.app')
@section('title','Role Details')
@section('content')
<div class="page-heading">
  <div>
    <h4><i class="fa-solid fa-key me-2 text-primary"></i>{{ $role->title }}</h4>
    <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('roles.index') }}" class="text-decoration-none text-muted">Roles</a> &rsaquo; Details</p>
  </div>
  <div class="d-flex gap-2">
    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen me-1"></i>Edit</a>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
  </div>
</div>
<div class="card" style="max-width:400px;">
  <div class="card-body">
    <dl class="row mb-0">
      <dt class="col-sm-4 text-muted fw-medium">Title</dt>
      <dd class="col-sm-8">{{ $role->title }}</dd>
    </dl>
  </div>
</div>
@endsection
