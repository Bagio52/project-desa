<nav id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <span>Ngendrosari</span>
        </a>
        <button type="button" id="sidebarCollapse" class="btn btn-light btn-sm d-lg-none">
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </button>
    </div>

    <ul class="list-unstyled components">
        <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li>
        <li class="{{ request()->is('admin/berita*') ? 'active' : '' }}">
            <a href="{{ route('admin.berita.index') }}">
                <i class="bi bi-file-earmark-text"></i>
                Kelola Berita
            </a>
        </li>
        <li class="{{ request()->is('admin/galery*') ? 'active' : '' }}">
            <a href="{{ route('admin.galery.index') }}">
                <i class="bi bi-file-earmark-text"></i>
                Kelola Galery
            </a>
        </li>

    </ul>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger w-100 mt-3">
            <i class="bi bi-box-arrow-left"></i>
            Logout
        </button>
    </form>
</nav>
