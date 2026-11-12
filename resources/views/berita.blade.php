<!-- News Section -->
<section id="berita" class="berita section py-5 bg-light">

    <!-- Section Title -->
    <div class="container section-title text-center mb-5" data-aos="fade-up">
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-2 fw-semibold">
            INFORMASI TERKINI
        </span>
        <h2 class="fw-bold display-6">Warta & Berita Desa</h2>
        <p class="text-muted mx-auto" style="max-width: 650px;">
            Dapatkan informasi dan kabar terbaru seputar kegiatan, pembangunan, serta pengumuman resmi Desa Ngendrosari.
        </p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @forelse ($beritas as $berita)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden d-flex flex-column transition-all" 
                         style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        
                        <!-- Image Container with Date Badge -->
                        <div class="position-relative overflow-hidden" style="height: 220px;">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                     class="w-100 h-100 object-fit-cover" 
                                     alt="{{ $berita->judul }}"
                                     style="transition: transform 0.4s ease;"
                                     onmouseover="this.style.transform='scale(1.08)'"
                                     onmouseout="this.style.transform='scale(1)'">
                            @else
                                <div class="w-100 h-100 bg-secondary-subtle d-flex align-items-center justify-content-center text-muted">
                                    <i class="bi bi-image fs-1"></i>
                                </div>
                            @endif

                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-primary text-white rounded-pill px-3 py-1 shadow-sm small">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ $berita->created_at ? $berita->created_at->format('d M Y') : 'Berita' }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4 d-flex flex-column flex-grow-1">
                            <h5 class="card-title fw-bold text-dark mb-2 lh-base" style="font-size: 1.1rem;">
                                {{ $berita->judul }}
                            </h5>
                            
                            <p class="card-text text-muted small flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.5;">
                                {{ $berita->deskripsi }}
                            </p>

                            <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                                <span class="text-muted small">
                                    <i class="bi bi-person-fill me-1"></i> Admin Desa
                                </span>
                                <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 d-inline-flex align-items-center gap-1">
                                    <span>Selengkapnya</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-newspaper text-muted" style="font-size: 3.5rem;"></i>
                    <p class="text-muted mt-3">Belum ada berita yang dipublikasikan saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section><!-- End News Section -->
