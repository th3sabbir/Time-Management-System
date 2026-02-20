@extends('layouts.app')
@section('title', 'Reports')
@section('content')

<div class="page-heading">
    <div>
        <h4><i class="fa-solid fa-chart-bar me-2 text-primary"></i>Reports</h4>
        <p class="text-muted mb-0" style="font-size:13px;">Time summary by project and work type</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header"><i class="fa-solid fa-filter me-2 text-primary"></i>Date Range Filter</div>
    <div class="card-body">
        {!! Form::open(['method'=>'get']) !!}
        <div class="row g-3 align-items-end">
            <div class="col-sm-4 col-md-3">
                {!! Form::label('from', 'From', ['class'=>'form-label']) !!}
                {!! Form::text('from', old('from', Request::get('from', date('Y-m-d'))), ['class'=>'form-control flatpickr-date']) !!}
            </div>
            <div class="col-sm-4 col-md-3">
                {!! Form::label('to', 'To', ['class'=>'form-label']) !!}
                {!! Form::text('to', old('to', Request::get('to', date('Y-m-d'))), ['class'=>'form-control flatpickr-date']) !!}
            </div>
            <div class="col-sm-4 col-md-3">
                {!! Form::submit('Generate Report', ['class'=>'btn btn-primary w-100']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><i class="fa-solid fa-briefcase me-2 text-primary"></i>Time by Projects</div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr><th>Project</th><th class="text-end">Duration</th></tr>
                    </thead>
                    <tbody>
                        @forelse($projects_time as $p)
                        <tr>
                            <td class="fw-500">{{ $p['name'] }}</td>
                            <td class="text-end"><span class="badge" style="background:#6366f1;font-size:13px;">{{ gmdate('H:i:s', $p['time']) }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="text-center text-muted py-3">No data for selected range</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><i class="fa-solid fa-layer-group me-2 text-primary"></i>Time by Work Type</div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr><th>Work Type</th><th class="text-end">Duration</th></tr>
                    </thead>
                    <tbody>
                        @forelse($work_type_time as $w)
                        <tr>
                            <td class="fw-500">{{ $w['name'] }}</td>
                            <td class="text-end"><span class="badge" style="background:#0d9488;font-size:13px;">{{ gmdate('H:i:s', $w['time']) }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="text-center text-muted py-3">No data for selected range</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>flatpickr('.flatpickr-date',{dateFormat:'Y-m-d'});</script>
@endsection
