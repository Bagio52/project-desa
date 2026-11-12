<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0 text-decoration-none">
            <span class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-3 p-2 me-2 shadow-sm" style="width: 38px; height: 38px;">
                <i class="bi bi-tree-fill fs-5"></i>
            </span>
            <h1 class="sitename mb-0 fw-bold fs-4">Desa Ngendrosari</h1>
        </a>

        @include('components.navbar')

        <div class="header-social-links d-flex align-items-center gap-2">
            <a href="https://facebook.com" target="_blank" class="facebook" title="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://instagram.com" target="_blank" class="instagram" title="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://youtube.com" target="_blank" class="youtube" title="YouTube"><i class="bi bi-youtube"></i></a>
            <a href="{{ route('admin.login') }}" class="btn btn-sm btn-primary rounded-pill px-3 py-1 text-white text-decoration-none ms-2 shadow-sm d-inline-flex align-items-center gap-1">
                <i class="bi bi-shield-lock"></i>
                <span class="d-none d-sm-inline">Admin</span>
            </a>
        </div>

    </div>
</header>
