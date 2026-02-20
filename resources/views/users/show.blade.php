@extends('layouts.app')
@section('title','User Details')
@section('content')
<div class="page-heading">
  <div>
    <h4><i class="fa-regular fa-user me-2 text-primary"></i>{{ $user->name }}</h4>
    <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('users.index') }}" class="text-decoration-none text-muted">Users</a> &rsaquo; Details</p>
  </div>
  <div class="d-flex gap-2">
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen me-1"></i>Edit</a>
    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
  </div>
</div>
<div class="card" style="max-width:520px;">
  <div class="card-body">
    <dl class="row mb-0">
      <dt class="col-sm-4 text-muted fw-medium">Name</dt>
      <dd class="col-sm-8">{{ $user->name }}</dd>
      <dt class="col-sm-4 text-muted fw-medium">Email</dt>
      <dd class="col-sm-8">{{ $user->email }}</dd>
      <dt class="col-sm-4 text-muted fw-medium">Role</dt>
      <dd class="col-sm-8">
        @if($user->role)
          <span class="badge" style="background:#0d9488;font-size:12px;">{{ $user->role->title }}</span>
        @else
          <span class="text-muted">N/A</span>
        @endif
      </dd>
      <dt class="col-sm-4 text-muted fw-medium">Joined</dt>
      <dd class="col-sm-8">{{ $user->created_at ? $user->created_at->format('M d, Y') : '—' }}</dd>
    </dl>
  </div>
</div>
@endsection
