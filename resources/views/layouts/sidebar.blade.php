<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span class="nav-link-title">My Logo</span>
{{--            <img src="{{ asset('images/my-logo.png') }}" alt="My Logo" class="navbar-brand-image">--}}
        </a>
        <div class="collapse navbar-collapse show" id="sidebar-menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-home"></i>
            </span>
                        <span class="nav-link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit', Auth::user()->id) }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-user"></i>
            </span>
                        <span class="nav-link-title">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
