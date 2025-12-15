<!--News Section-->
<section id="berita" class="berita section">
    <!--Section Title-->
    <div class="container section-title" data-aos="fade-up">
        <h2>Berita Terbaru</h2>
    </div><!--End Section Title-->

    <div class="container">

        <div class="row gy-4">

            {{-- <div class="col-lg-4 col-md- d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 shadow-sm border-1">
                    <div class="berita-item rounded-4">
                        <div class="img">
                            <img src="assets\img\Bg.png" class="img-fluid rounded-4" alt="">
                        </div>
                        <div class="berita-content p-4">
                            <h4>Peringatan HUT-RI Ke-80 Tahun 2025</h4>
                            <p>Desa Ngendrosari menggelar acara gelar budaya dalam memperingati HUT-RI.</p>
                            <a href="berita-details.html" class="stretched-link">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            @foreach ($beritas as $berita)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 shadow-sm border-1">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded-4 gambar-berita"
                        alt="{{ $berita->judul }}">
                        <div class="berita-conten p-4 card-title">
                            <h4>{{ $berita->judul}}</h4>
                            {{-- <p>{{ $berita->deskripsi}}</p> --}}
                            <a href="berita-details.html" class="stretched-link btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section><!--End News Section-->
