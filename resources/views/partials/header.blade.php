<div class="topbar">
    <div class="d-flex align-items-center gap-3">
        <button id="sidebarToggle" class="btn-toggle"><i class="fa-solid fa-bars"></i></button>
        <span class="page-title-bar">@yield('title', 'Dashboard')</span>
    </div>
    <div class="top-right">
        <div class="position-relative">
            <a href="#" class="d-flex align-items-center gap-2 text-decoration-none text-dark" data-bs-toggle="dropdown">
                <div class="avatar">{{ substr(auth()->user()->name ?? 'U', 0, 1) }}</div>
                <span class="d-none d-sm-block fw-500" style="font-size:13px;color:#334155;">{{ auth()->user()->name ?? '' }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="min-width:180px;border-radius:10px;">
                <li><span class="dropdown-item-text text-muted" style="font-size:12px;">{{ auth()->user()->email ?? '' }}</span></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger d-flex align-items-center gap-2" href="#"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<form id="logout-form" method="POST" action="{{ route('auth.logout') }}" style="display:none;">@csrf</form>
