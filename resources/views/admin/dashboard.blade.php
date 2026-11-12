@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <!-- Welcome Header Banner -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-2">
        <div>
            <h4 class="fw-bold mb-1 text-dark">
                Selamat Datang, Admin! 👋
            </h4>
            <p class="text-muted small mb-0">Kelola dan pantau seluruh konten publikasi Desa Ngendrosari dari satu panel.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.berita.create') }}" class="btn-admin-primary">
                <i class="bi bi-plus-lg"></i>
                <span>Tulis Berita</span>
            </a>
            <a href="{{ route('admin.galery.create') }}" class="btn-admin-secondary">
                <i class="bi bi-upload"></i>
                <span>Upload Foto</span>
            </a>
        </div>
    </div>

    <!-- Metric Stat Cards -->
    <div class="row g-3 mb-4">
        <!-- Total Berita -->
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card stat-blue">
                <div>
                    <div class="stat-number">{{ $totalBerita ?? \App\Models\Berita::count() }}</div>
                    <p class="stat-label">Total Berita Terbit</p>
                </div>
                <div class="stat-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
            </div>
        </div>

        <!-- Total Galeri -->
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card stat-green">
                <div>
                    <div class="stat-number">{{ $totalGalery ?? \App\Models\Galery::count() }}</div>
                    <p class="stat-label">Koleksi Foto Galeri</p>
                </div>
                <div class="stat-icon">
                    <i class="bi bi-images"></i>
                </div>
            </div>
        </div>

        <!-- Status Website -->
        <div class="col-12 col-sm-12 col-xl-4">
            <div class="stat-card stat-purple">
                <div>
                    <div class="stat-number text-success fs-3">
                        <i class="bi bi-check-circle-fill me-1"></i> Aktif
                    </div>
                    <p class="stat-label">Status Website Publik</p>
                </div>
                <div class="stat-icon">
                    <i class="bi bi-globe-asia-australia"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Content Overviews -->
    <div class="row g-4">
        <!-- Recent Berita -->
        <div class="col-12 col-lg-7">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">
                        <i class="bi bi-clock-history text-primary"></i> Berita Terbaru
                    </h5>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-link text-decoration-none">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Sampul</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $beritaItems = $recentBerita ?? \App\Models\Berita::latest()->take(5)->get();
                            @endphp

                            @forelse ($beritaItems as $item)
                                <tr>
                                    <td style="width: 60px;">
                                        @if ($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="table-thumbnail" style="width: 44px; height: 44px;">
                                        @else
                                            <div class="table-thumbnail d-flex align-items-center justify-content-center bg-light text-muted" style="width: 44px; height: 44px;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark text-truncate" style="max-width: 260px;">
                                            {{ $item->judul }}
                                        </div>
                                    </td>
                                    <td class="text-muted small" style="white-space: nowrap;">
                                        {{ $item->created_at ? $item->created_at->format('d/m/Y') : '-' }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn-action-edit" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Belum ada data berita.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Galeri -->
        <div class="col-12 col-lg-5">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">
                        <i class="bi bi-images text-primary"></i> Galeri Terbaru
                    </h5>
                    <a href="{{ route('admin.galery.index') }}" class="btn btn-sm btn-link text-decoration-none">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="admin-card-body">
                    @php
                        $galeryItems = $recentGalery ?? \App\Models\Galery::latest()->take(6)->get();
                    @endphp

                    <div class="row g-2">
                        @forelse ($galeryItems as $foto)
                            <div class="col-4">
                                <div class="position-relative rounded overflow-hidden shadow-sm" style="height: 95px;">
                                    <img src="{{ asset('storage/' . $foto->gambar) }}" 
                                         alt="{{ $foto->nama }}" 
                                         class="w-100 h-100 object-fit-cover"
                                         title="{{ $foto->nama }}">
                                </div>
                                <div class="text-truncate small fw-medium text-dark mt-1" title="{{ $foto->nama }}">
                                    {{ $foto->nama }}
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center text-muted py-4">
                                Belum ada foto di galeri.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
