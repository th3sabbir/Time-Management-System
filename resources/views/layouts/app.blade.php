<!DOCTYPE html>
<html lang="en">
<head>@include('partials.head')</head>
<body>
<div class="overlay"></div>
@include('partials.sidebar')
<div class="main-wrap">
    @include('partials.header')
    <div class="main-content">
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>{{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if($errors->count() > 0)
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <i class="fa-solid fa-circle-exclamation me-2"></i>
                <ul class="mb-0 mt-1 list-unstyled">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
</div>
@include('partials.javascripts')
</body>
</html>
