@extends('layouts.app')
@section('title','Edit User')
@section('content')
<div class="page-heading">
  <div>
    <h4><i class="fa-solid fa-pen me-2 text-primary"></i>Edit User</h4>
    <p class="text-muted mb-0" style="font-size:13px;"><a href="{{ route('users.index') }}" class="text-decoration-none text-muted">Users</a> &rsaquo; Edit</p>
  </div>
</div>
{!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
<div class="card" style="max-width:600px;">
  <div class="card-header"><i class="fa-regular fa-user me-2 text-primary"></i>User Details</div>
  <div class="card-body">
    <div class="mb-3">
      {!! Form::label('name', 'Full Name *', ['class' => 'form-label']) !!}
      {!! Form::text('name', old('name', $user->name), ['class' => 'form-control']) !!}
      @error('name')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
      {!! Form::label('email', 'Email Address *', ['class' => 'form-label']) !!}
      {!! Form::email('email', old('email', $user->email), ['class' => 'form-control']) !!}
      @error('email')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
      {!! Form::label('password', 'New Password (leave blank to keep)', ['class' => 'form-label']) !!}
      {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Leave blank to keep current password']) !!}
      @error('password')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
      {!! Form::label('role_id', 'Role *', ['class' => 'form-label']) !!}
      {!! Form::select('role_id', $roles, old('role_id', $user->role_id), ['class' => 'form-select']) !!}
      @error('role_id')<div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>@enderror
    </div>
  </div>
</div>
<div class="mt-3 d-flex gap-2">
  {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
</div>
{!! Form::close() !!}
@endsection
