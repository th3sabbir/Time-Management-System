@extends('layouts.app')
@section('title', 'Work Types')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-layer-group me-2 text-primary"></i>Work Types</h4>
        <p class="text-muted mb-0" style="font-size:13px;">Categorize your work activities</p>
    </div>
    <div class="d-flex gap-2">
        <button id="btn-mass-delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash me-1"></i>Delete Selected</button>
        <a href="{{ route('work_types.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i>Add New</a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0 {{ count($work_types) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th style="width:40px;"><input type="checkbox" id="select-all"></th>
                        <th>Name</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($work_types as $work_type)
                    <tr data-entry-id="{{ $work_type->id }}">
                        <td><input type="checkbox" name="ids[]" value="{{ $work_type->id }}"></td>
                        <td class="fw-500">{{ $work_type->name }}</td>
                        <td class="text-end table-actions">
                            <a href="{{ route('work_types.show', $work_type->id) }}" class="btn btn-xs btn-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('work_types.edit', $work_type->id) }}" class="btn btn-xs btn-info"><i class="fa-solid fa-pen"></i></a>
                            {!! Form::open(['method'=>'DELETE','route'=>['work_types.destroy',$work_type->id],'onsubmit'=>"return confirm('Delete this work type?')",'style'=>'display:inline']) !!}
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa-solid fa-trash"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center text-muted py-4"><i class="fa-solid fa-inbox me-2"></i>No work types found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>window.route_mass_crud_entries_destroy='{{ route("work_types.mass_destroy") }}';</script>
@endsection
