<header class="navbar navbar-expand-md d-print-none">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Only show this if user is logged in --}}
    @auth
        <div class="navbar-nav flex-row order-md-last ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url('https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}')"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="mall text-muted dropdown-menu dropdown-menu-end me-3 mt-2">{{ Auth::user()->email }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('profile.edit', Auth::user()->id) }}" class="dropdown-item">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth

    {{-- Show Login/Register if user is not logged in --}}
    @guest
        <div class="navbar-nav flex-row order-md-last ms-auto">
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="nav-link">Register</a>
        </div>
    @endguest
</header>
