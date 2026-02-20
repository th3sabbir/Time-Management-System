@extends('layouts.app')
@section('title','Audit Log')
@section('content')

<div class="page-heading">
  <div>
    <h4><i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i>Audit Log</h4>
    <p class="text-muted mb-0" style="font-size:13px;">System activity history</p>
  </div>
</div>

<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <span><i class="fa-solid fa-list me-2 text-muted"></i>Activity Records</span>
    <span class="badge bg-secondary">{{ count($user_actions) }} entries</span>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0 {{ count($user_actions) > 0 ? 'datatable' : '' }}">
        <thead>
          <tr>
            <th>#</th>
            <th>User</th>
            <th>Action</th>
            <th>Model</th>
            <th>Record ID</th>
          </tr>
        </thead>
        <tbody>
          @forelse($user_actions as $ua)
          <tr>
            <td class="text-muted" style="font-size:12px;">{{ $ua->id }}</td>
            <td>
              @if($ua->user)
                <div style="display:flex;align-items:center;gap:8px;">
                  <div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#6366f1,#8b5cf6);color:#fff;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0;">{{ substr($ua->user->name,0,1) }}</div>
                  {{ $ua->user->name }}
                </div>
              @else
                <span class="text-muted">&mdash;</span>
              @endif
            </td>
            <td>
              @php
                $cls = ['created'=>'success','updated'=>'warning','deleted'=>'danger'][strtolower($ua->action ?? '')] ?? 'secondary';
              @endphp
              <span class="badge bg-{{ $cls }}">{{ $ua->action }}</span>
            </td>
            <td><code style="background:#f1f5f9;padding:2px 6px;border-radius:4px;font-size:12px;">{{ $ua->action_model }}</code></td>
            <td><span class="text-muted" style="font-size:12px;">#{{ $ua->action_id }}</span></td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center py-5 text-muted">
              <i class="fa-regular fa-clock fa-2x mb-2 d-block"></i>
              No activity recorded yet.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
