<nav id="sidebar" class="admin-sidebar">
    <!-- Sidebar Header / Brand -->
    <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-brand">
        <div class="brand-icon">
            <i class="bi bi-shield-shaded"></i>
        </div>
        <div>
            <h6 class="brand-title">Desa Ngendrosari</h6>
            <p class="brand-subtitle">Panel Administrasi</p>
        </div>
    </a>

    <!-- Navigation List -->
    <ul class="admin-nav-list">
        <li class="admin-nav-header">Menu Utama</li>
        
        <li class="admin-nav-item">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="admin-nav-header">Manajemen Konten</li>

        <li class="admin-nav-item">
            <a href="{{ route('admin.berita.index') }}" class="admin-nav-link {{ request()->is('admin/berita*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                <span>Kelola Berita</span>
            </a>
        </li>

        <li class="admin-nav-item">
            <a href="{{ route('admin.galery.index') }}" class="admin-nav-link {{ request()->is('admin/galery*') ? 'active' : '' }}">
                <i class="bi bi-images"></i>
                <span>Kelola Galeri</span>
            </a>
        </li>
    </ul>

    <!-- Logout Action Footer -->
    <div class="admin-sidebar-footer">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn-admin-logout" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar (Logout)</span>
            </button>
        </form>
    </div>
</nav>
