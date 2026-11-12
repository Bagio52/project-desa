<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Admin - Desa Ngendrosari</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />

    <!-- Admin Custom Stylesheet -->
    <link href="{{ asset('assets/css/admin-custom.css') }}" rel="stylesheet">
</head>

<body class="admin-body">

    <!-- Mobile Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar Navigation -->
    @include('components.sidebar')

    <!-- Main Content Container -->
    <div class="admin-main">
        <!-- Top Navbar Header -->
        <header class="admin-topbar">
            <div class="admin-topbar-left">
                <button type="button" id="sidebarToggleBtn" class="btn btn-light d-lg-none shadow-sm border">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <div class="d-none d-sm-block">
                    <span class="text-muted small">
                        <i class="bi bi-calendar-event me-1"></i>
                        {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                    </span>
                </div>
            </div>

            <div class="admin-topbar-right">
                <a href="{{ url('/') }}" target="_blank" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1 rounded-pill px-3">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <span>Lihat Website</span>
                </a>
            </div>
        </header>

        <!-- Content Area -->
        <main id="main" class="admin-content-body">
            <!-- Global Flash Alerts -->
            @if (session('success'))
                <div class="admin-alert admin-alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                    <div class="flex-grow-1">
                        <strong>Berhasil!</strong> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="admin-alert admin-alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
                    <div class="flex-grow-1">
                        <strong>Perhatian:</strong> {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="admin-alert admin-alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon-fill fs-5 text-danger"></i>
                    <div class="flex-grow-1">
                        <strong>Terjadi Kesalahan:</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const overlay = document.getElementById('sidebarOverlay');

            if (toggleBtn && sidebar && overlay) {
                toggleBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('show');
                    overlay.classList.toggle('show');
                });

                overlay.addEventListener('click', function () {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                });
            }
        });
    </script>
</body>

</html>
