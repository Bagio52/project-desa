@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background position-relative py-5">
        <img src="{{ asset('assets/img/Bg.png') }}"
            alt="Pemandangan Desa Ngendrosari"
            data-aos="fade-in"
            style="filter: brightness(0.65);">

        <div class="container py-5" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9 col-md-11">
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill mb-3 fw-semibold text-uppercase" style="letter-spacing: 1px;">
                        <i class="bi bi-geo-alt-fill me-1"></i> Website Resmi Pemerintah Desa
                    </span>

                    <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
                        Selamat Datang di Desa Ngendrosari
                    </h1>

                    <p class="lead text-white-50 mb-4 px-lg-5" style="font-size: 1.15rem; text-shadow: 0 1px 4px rgba(0,0,0,0.5);">
                        Kecamatan Kajoran, Kabupaten Magelang, Jawa Tengah.<br>
                        Desa yang asri, berbudaya luhur, berdaya saing, dan mengedepankan semangat gotong royong.
                    </p>

                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#about" class="btn btn-primary btn-lg rounded-pill px-4 py-2 shadow-lg fw-semibold d-inline-flex align-items-center gap-2">
                            <span>Tentang Desa</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="#berita" class="btn btn-outline-light btn-lg rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
                            <i class="bi bi-newspaper"></i>
                            <span>Berita Terkini</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Feature Highlights -->
            <div class="row g-3 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-6 col-md-3">
                    <div class="p-3 rounded-4 text-center text-white h-100" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.2);">
                        <i class="bi bi-flower1 fs-2 text-warning mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1 text-white">Alam Asri</h6>
                        <small class="text-white-50">Pertanian & Keindahan Alam</small>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="p-3 rounded-4 text-center text-white h-100" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.2);">
                        <i class="bi bi-people-fill fs-2 text-info mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1 text-white">Gotong Royong</h6>
                        <small class="text-white-50">Guyub Rukun & Ramah</small>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="p-3 rounded-4 text-center text-white h-100" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.2);">
                        <i class="bi bi-building-check fs-2 text-success mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1 text-white">Layanan Prima</h6>
                        <small class="text-white-50">Cepat & Transparan</small>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="p-3 rounded-4 text-center text-white h-100" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.2);">
                        <i class="bi bi-shop fs-2 text-warning mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1 text-white">Potensi UMKM</h6>
                        <small class="text-white-50">Produk Lokal Berdaya</small>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    @include('about')
    @include('berita')
    @include('galery')
    @include('contact')
@endsection
