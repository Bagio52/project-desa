<!-- Contact Section -->
<section id="contact" class="contact section py-5 bg-light">

    <!-- Section Title -->
    <div class="container section-title text-center mb-5" data-aos="fade-up">
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-2 fw-semibold">
            LAYANAN & INFORMASI
        </span>
        <h2 class="fw-bold display-6">Kontak & Lokasi</h2>
        <p class="text-muted mx-auto" style="max-width: 650px;">
            Hubungi Pemerintah Desa Ngendrosari untuk pengurusan surat, pertanyaan, saran, atau informasi lainnya.
        </p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

            <!-- Informasi Kontak -->
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-3">
                    
                    <!-- Alamat -->
                    <div class="card border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center gap-3">
                        <div class="bg-primary text-white rounded-3 p-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 52px; height: 52px;">
                            <i class="bi bi-geo-alt-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark">Alamat Kantor Desa</h6>
                            <p class="text-muted small mb-0">Desa Ngendrosari, Kec. Kajoran, Kab. Magelang, Jawa Tengah 56163</p>
                        </div>
                    </div>

                    <!-- Telepon / WA -->
                    <div class="card border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center gap-3">
                        <div class="bg-success text-white rounded-3 p-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 52px; height: 52px;">
                            <i class="bi bi-whatsapp fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark">Telepon / WhatsApp</h6>
                            <p class="text-muted small mb-0">+62 831-9730-3155</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="card border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center gap-3">
                        <div class="bg-info text-white rounded-3 p-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 52px; height: 52px;">
                            <i class="bi bi-envelope-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark">Email Resmi</h6>
                            <p class="text-muted small mb-0">desangendrosari@gmail.com</p>
                        </div>
                    </div>

                    <!-- Jam Pelayanan -->
                    <div class="card border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center gap-3">
                        <div class="bg-warning text-white rounded-3 p-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 52px; height: 52px;">
                            <i class="bi bi-clock-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark">Jam Pelayanan Kantor</h6>
                            <p class="text-muted small mb-0">Senin - Jumat: 08.00 - 15.30 WIB</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Form Kirim Pesan -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h5 class="fw-bold text-dark mb-3">
                        <i class="bi bi-chat-dots-fill text-primary me-2"></i>Kirimkan Aspirasi / Pesan
                    </h5>

                    <form action="#" method="post" class="php-email-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control rounded-3" placeholder="Masukkan nama Anda" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Email / No. HP</label>
                                <input type="text" class="form-control rounded-3" name="email" placeholder="email@contoh.com / 0812..." required>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold">Subjek / Perihal</label>
                                <input type="text" class="form-control rounded-3" name="subject" placeholder="Contoh: Permohonan Surat / Informasi" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold">Isi Pesan</label>
                                <textarea class="form-control rounded-3" name="message" rows="5" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." required></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2">
                                    <i class="bi bi-send-fill"></i>
                                    <span>Kirim Pesan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- End Contact Form -->

        </div>
    </div>

</section><!-- /Contact Section -->
