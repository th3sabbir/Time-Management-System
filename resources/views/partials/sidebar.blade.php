@inject('request', 'Illuminate\Http\Request')
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"><i class="fa-solid fa-clock"></i></div>
        <div class="brand-name">Track<span>Time</span></div>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-section-label">Main</div>

        <div class="sidebar-item">
            <a href="{{ url('/home') }}" class="sidebar-link {{ $request->segment(1)=='home' ? 'active' : '' }}">
                <i class="fa-solid fa-gauge icon"></i><span>Dashboard</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('time_entries.index') }}" class="sidebar-link {{ $request->segment(1)=='time_entries' ? 'active' : '' }}">
                <i class="fa-solid fa-stopwatch icon"></i><span>Time Entries</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('projects.index') }}" class="sidebar-link {{ $request->segment(1)=='projects' ? 'active' : '' }}">
                <i class="fa-solid fa-briefcase icon"></i><span>Projects</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('work_types.index') }}" class="sidebar-link {{ $request->segment(1)=='work_types' ? 'active' : '' }}">
                <i class="fa-solid fa-layer-group icon"></i><span>Work Types</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('reports.index') }}" class="sidebar-link {{ $request->segment(1)=='reports' ? 'active' : '' }}">
                <i class="fa-solid fa-chart-bar icon"></i><span>Reports</span>
            </a>
        </div>

        <div class="sidebar-divider"></div>
        <div class="sidebar-section-label">Administration</div>

        <div class="sidebar-item">
            <a href="#manageUsers" class="sidebar-link" data-bs-toggle="collapse" aria-expanded="{{ in_array($request->segment(1), ['users','roles','user_actions']) ? 'true' : 'false' }}">
                <i class="fa-solid fa-users icon"></i><span>Manage Users</span>
                <i class="fa-solid fa-chevron-right arrow ms-auto"></i>
            </a>
            <div class="collapse sidebar-submenu {{ in_array($request->segment(1), ['users','roles','user_actions']) ? 'show' : '' }}" id="manageUsers">
                <a href="{{ route('users.index') }}" class="sidebar-link {{ $request->segment(1)=='users' ? 'active' : '' }}">
                    <i class="fa-regular fa-user icon"></i><span>Users</span>
                </a>
                <a href="{{ route('roles.index') }}" class="sidebar-link {{ $request->segment(1)=='roles' ? 'active' : '' }}">
                    <i class="fa-solid fa-key icon"></i><span>Roles</span>
                </a>
                <a href="{{ route('user_actions.index') }}" class="sidebar-link {{ $request->segment(1)=='user_actions' ? 'active' : '' }}">
                    <i class="fa-solid fa-list-check icon"></i><span>User Actions</span>
                </a>
            </div>
        </div>
    </div>

    <div class="sidebar-logout">
        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
        </a>
    </div>
</div>
