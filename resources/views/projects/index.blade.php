@extends('layouts.app')
@section('title', 'Projects')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-briefcase me-2 text-primary"></i>Projects</h4>
        <p class="text-muted mb-0" style="font-size:13px;">Manage your projects</p>
    </div>
    <div class="d-flex gap-2">
        <button id="btn-mass-delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash me-1"></i>Delete Selected</button>
        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i>Add New</a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0 {{ count($projects) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th style="width:40px;"><input type="checkbox" id="select-all"></th>
                        <th>Name</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr data-entry-id="{{ $project->id }}">
                        <td><input type="checkbox" name="ids[]" value="{{ $project->id }}"></td>
                        <td class="fw-500">{{ $project->name }}</td>
                        <td class="text-end table-actions">
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-xs btn-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-xs btn-info"><i class="fa-solid fa-pen"></i></a>
                            {!! Form::open(['method'=>'DELETE','route'=>['projects.destroy',$project->id],'onsubmit'=>"return confirm('Delete this project?')",'style'=>'display:inline']) !!}
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa-solid fa-trash"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center text-muted py-4"><i class="fa-solid fa-inbox me-2"></i>No projects found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>window.route_mass_crud_entries_destroy='{{ route("projects.mass_destroy") }}';</script>
@endsection
