@extends('layouts.app')
@section('title', 'Users')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-regular fa-user me-2 text-primary"></i>Users</h4>
        <p class="text-muted mb-0" style="font-size:13px;">Manage system users</p>
    </div>
    <div class="d-flex gap-2">
        <button id="btn-mass-delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash me-1"></i>Delete Selected</button>
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i>Add New</a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0 {{ count($users) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th style="width:40px;"><input type="checkbox" id="select-all"></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr data-entry-id="{{ $user->id }}">
                        <td><input type="checkbox" name="ids[]" value="{{ $user->id }}"></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:30px;height:30px;background:linear-gradient(135deg,#6366f1,#8b5cf6);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:600;font-size:12px;flex-shrink:0;">
                                    {{ strtoupper(substr($user->name,0,1)) }}
                                </div>
                                <span class="fw-500">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td><span class="badge" style="background:#0d9488;">{{ optional($user->role)->title ?? '—' }}</span></td>
                        <td class="text-end table-actions">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-info"><i class="fa-solid fa-pen"></i></a>
                            {!! Form::open(['method'=>'DELETE','route'=>['users.destroy',$user->id],'onsubmit'=>"return confirm('Delete this user?')",'style'=>'display:inline']) !!}
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa-solid fa-trash"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-4"><i class="fa-solid fa-inbox me-2"></i>No users found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>window.route_mass_crud_entries_destroy='{{ route("users.mass_destroy") }}';</script>
@endsection
