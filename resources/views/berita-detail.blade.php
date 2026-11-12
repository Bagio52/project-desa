@extends('layouts.app')

@section('content')
<!-- Page Header / Breadcrumb -->
<section class="py-4 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none"><i class="bi bi-house-door me-1"></i>Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}#berita" class="text-decoration-none">Berita Desa</a></li>
                <li class="breadcrumb-item active text-truncate" style="max-width: 300px;" aria-current="page">{{ $berita->judul }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- News Detail Content Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Main Article Column -->
            <div class="col-lg-8">
                <article class="news-detail-card">
                    
                    <!-- Article Category & Title -->
                    <div class="mb-3">
                        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-semibold mb-2">
                            <i class="bi bi-tag-fill me-1"></i> Warta Desa
                        </span>
                        <h1 class="fw-bold text-dark display-6 mb-3 lh-sm">{{ $berita->judul }}</h1>
                        
                        <!-- Metadata Bar -->
                        <div class="d-flex flex-wrap align-items-center gap-3 text-muted small pb-3 border-bottom">
                            <div class="d-flex align-items-center gap-1">
                                <i class="bi bi-calendar3 text-primary"></i>
                                <span>{{ $berita->created_at ? $berita->created_at->isoFormat('D MMMM YYYY') : '-' }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="bi bi-person-fill text-primary"></i>
                                <span>Humas Pemdes Ngendrosari</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="bi bi-clock text-primary"></i>
                                <span>{{ $berita->created_at ? $berita->created_at->format('H:i') : '' }} WIB</span>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="mb-4 rounded-4 overflow-hidden shadow-sm" style="max-height: 480px;">
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                 alt="{{ $berita->judul }}" 
                                 class="w-100 h-100 object-fit-cover">
                        @else
                            <div class="p-5 text-center bg-light text-muted">
                                <i class="bi bi-image fs-1"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Article Body Content -->
                    <div class="news-content text-dark fs-6 lh-lg mb-5">
                        {!! nl2br(e($berita->deskripsi)) !!}
                    </div>

                    <!-- Action Bar & Back Link -->
                    <div class="p-4 bg-light rounded-4 d-flex flex-wrap align-items-center justify-content-between gap-3 border">
                        <div>
                            <span class="fw-semibold text-dark d-block">Bagikan Informasi Ini:</span>
                            <span class="small text-muted">Bantu wujudkan keterbukaan informasi desa</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}" 
                               target="_blank" 
                               class="btn btn-success btn-sm rounded-pill px-3 d-inline-flex align-items-center gap-1">
                                <i class="bi bi-whatsapp"></i> Bagikan WA
                            </a>
                            <a href="{{ route('home') }}#berita" class="btn btn-outline-secondary btn-sm rounded-pill px-3 d-inline-flex align-items-center gap-1">
                                <i class="bi bi-arrow-left"></i> Kembali ke Berita
                            </a>
                        </div>
                    </div>

                </article>
            </div>

            <!-- Sidebar Column / Berita Lainnya -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
                        <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2">
                            <i class="bi bi-newspaper text-primary"></i> Berita Lainnya
                        </h5>

                        <div class="d-flex flex-column gap-3">
                            @forelse ($recentBerita as $item)
                                <a href="{{ route('berita.show', $item->id) }}" class="text-decoration-none group-item">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="rounded-3 overflow-hidden flex-shrink-0" style="width: 75px; height: 75px;">
                                            @if ($item->gambar)
                                                <img src="{{ asset('storage/' . $item->gambar) }}" 
                                                     alt="{{ $item->judul }}" 
                                                     class="w-100 h-100 object-fit-cover">
                                            @else
                                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted">
                                                    <i class="bi bi-image"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold text-dark mb-1 small lh-base text-clamp-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $item->judul }}
                                            </h6>
                                            <span class="text-muted small fs-7">
                                                <i class="bi bi-calendar3 me-1"></i>
                                                {{ $item->created_at ? $item->created_at->format('d M Y') : '' }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p class="text-muted small mb-0 py-2">Belum ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Banner Callout -->
                    <div class="card border-0 bg-primary text-white rounded-4 p-4 shadow-sm text-center">
                        <i class="bi bi-info-circle fs-1 mb-2"></i>
                        <h6 class="fw-bold text-white mb-2">Layanan Warga Desa</h6>
                        <p class="small text-white-50 mb-3">Punya pertanyaan atau butuh pengurusan administrasi kependudukan?</p>
                        <a href="{{ route('home') }}#contact" class="btn btn-light text-primary btn-sm rounded-pill font-weight-bold px-3">
                            Hubungi Pemdes
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
