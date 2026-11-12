<!-- Gallery Section -->
<section id="galery" class="galery section py-5">

    <!-- Section Title -->
    <div class="container section-title text-center mb-5" data-aos="fade-up">
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-2 fw-semibold">
            DOKUMENTASI DESA
        </span>
        <h2 class="fw-bold display-6">Galeri & Potensi Desa</h2>
        <p class="text-muted mx-auto" style="max-width: 650px;">
            Potret keindahan alam, keramahan masyarakat, dan dinamika kegiatan di Desa Ngendrosari.
        </p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
            @forelse ($galeries as $galery)
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100 position-relative group-gallery"
                         style="transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                        
                        <!-- Image Container -->
                        <div class="overflow-hidden position-relative" style="height: 250px;">
                            <img src="{{ asset('storage/' . $galery->gambar) }}" 
                                 alt="{{ $galery->nama }}" 
                                 class="w-100 h-100 object-fit-cover"
                                 style="transition: transform 0.4s ease;"
                                 onmouseover="this.style.transform='scale(1.08)'"
                                 onmouseout="this.style.transform='scale(1)'">
                            
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-dark bg-opacity-50 text-white" 
                                 style="backdrop-filter: blur(4px);">
                                <h6 class="fw-bold mb-1 text-white text-truncate">{{ $galery->nama }}</h6>
                                @if ($galery->deskripsi)
                                    <p class="small text-white-50 mb-0 text-truncate">{{ $galery->deskripsi }}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-images text-muted" style="font-size: 3.5rem;"></i>
                    <p class="text-muted mt-3">Belum ada foto galeri yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section><!-- End Gallery Section -->
