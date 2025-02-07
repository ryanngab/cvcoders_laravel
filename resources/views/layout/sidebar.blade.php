<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">CVCoders</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">CVC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Content</li>
            <li class="nav-item dropdown {{ Request::routeIs('projects') ? 'active' : '' }}">
                <a href="{{ route('projects') }}" class="nav-link"><i class="fas fa-briefcase"></i><span>Projects</span></a>
            </li>
            <li class="menu-header">Account</li>
            @if(auth()->guest())
            <li class="nav-item dropdown {{ Request::routeIs('login') ? 'active' : '' }}">
                <a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i><span>Login</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::routeIs('register') ? 'active' : '' }}">
                <a href="{{ route('register') }}" class="nav-link"><i class="fas fa-user-plus"></i><span>Register</span></a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endif
        </ul>
    </aside>
</div>
