@extends('layouts.app')
@section('title','New Role')
@section('content')
<div class="page-heading">
  <div>
    <h4><i class="fa-solid fa-key me-2 text-primary"></i>New Role</h4>
    <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('roles.index') }}" class="text-decoration-none text-muted">Roles</a> &rsaquo; Create</p>
  </div>
</div>
{!! Form::open(['method' => 'POST', 'route' => ['roles.store']]) !!}
<div class="card" style="max-width:560px;">
  <div class="card-header"><i class="fa-solid fa-key me-2 text-primary"></i>Role Details</div>
  <div class="card-body">
    <div class="mb-3">
      {!! Form::label('title', 'Role Title *', ['class' => 'form-label']) !!}
      {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'e.g. Admin, Manager, Developer']) !!}
      @error('title')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
    </div>
  </div>
</div>
<div class="mt-3 d-flex gap-2">
  {!! Form::submit('Create Role', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
