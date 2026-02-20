@extends('layouts.auth')
@section('title', 'Sign In')
@section('content')
<div class="auth-card">
    <div class="auth-logo">
        <div class="logo-icon"><i class="fa-solid fa-clock"></i></div>
        <h2>TrackTime</h2>
        <p>Sign in to your workspace</p>
    </div>
    @if(count($errors) > 0)
    <div class="alert alert-danger mb-4">
        <i class="fa-solid fa-circle-exclamation me-2"></i>{{ $errors->first() }}
    </div>
    @endif
    <form method="POST" action="{{ url('login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="you@company.com" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Your password" required>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center gap-2 w-100">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
            <span>Sign In</span>
        </button>
    </form>
</div>
@endsection
