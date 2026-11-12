@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0" style="max-width: 900px;">
    <!-- Page Header & Back Button -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">
                <i class="bi bi-file-earmark-plus me-2 text-primary"></i>Tambah Berita
            </h4>
            <p class="text-muted small mb-0">Isi formulir di bawah ini untuk menerbitkan berita baru desa</p>
        </div>
        <a href="{{ route('admin.berita.index') }}" class="btn-admin-secondary">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="admin-card-title">
                <i class="bi bi-pencil-square text-primary"></i> Formulir Berita Baru
            </h5>
            <span class="text-danger small">* Wajib diisi</span>
        </div>

        <div class="admin-card-body">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul Berita -->
                <div class="mb-4">
                    <label for="judul" class="form-label">
                        Judul Berita <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           id="judul" 
                           name="judul" 
                           class="form-control @error('judul') is-invalid @enderror" 
                           placeholder="Contoh: Musyawarah Pembangunan Desa Tahun 2026" 
                           value="{{ old('judul') }}" 
                           required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text text-muted small">Buat judul yang ringkas, jelas, dan menarik perhatian warga.</div>
                </div>

                <!-- Unggah Gambar -->
                <div class="mb-4">
                    <label for="gambarInput" class="form-label">
                        Foto / Sampul Berita <span class="text-danger">*</span>
                    </label>

                    <div class="image-upload-zone" onclick="document.getElementById('gambarInput').click();">
                        <div class="upload-icon">
                            <i class="bi bi-cloud-arrow-up text-primary"></i>
                        </div>
                        <h6 class="upload-title">Klik untuk memilih foto atau seret ke sini</h6>
                        <p class="upload-subtitle">Format didukung: JPG, JPEG, PNG, GIF (Maks. 2MB)</p>
                        <input type="file" 
                               id="gambarInput" 
                               name="gambar" 
                               class="d-none @error('gambar') is-invalid @enderror" 
                               accept="image/*" 
                               required 
                               onchange="previewImage(this)">
                    </div>

                    @error('gambar')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Preview Container -->
                    <div id="imagePreviewWrapper" class="image-preview-container">
                        <div class="d-flex align-items-center gap-3">
                            <div class="image-preview-box">
                                <img id="previewImg" src="#" alt="Pratinjau Gambar">
                            </div>
                            <div>
                                <span class="badge bg-success-subtle text-success mb-2 px-3 py-1">Foto Dipilih</span>
                                <p id="fileName" class="fw-semibold text-dark small mb-1"></p>
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearPreview()">
                                    <i class="bi bi-x-circle me-1"></i> Ganti Foto
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi Berita -->
                <div class="mb-4">
                    <label for="deskripsi" class="form-label">
                        Isi / Deskripsi Berita <span class="text-danger">*</span>
                    </label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="6" 
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              placeholder="Tuliskan detail berita atau informasi selengkapnya di sini..." 
                              required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.berita.index') }}" class="btn-admin-secondary">
                        <i class="bi bi-x-lg"></i> Batal
                    </a>
                    <button type="submit" class="btn-admin-primary">
                        <i class="bi bi-check-lg"></i> Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('imagePreviewWrapper').style.display = 'block';
            }
            
            reader.readAsDataURL(file);
        }
    }

    function clearPreview() {
        const input = document.getElementById('gambarInput');
        input.value = '';
        document.getElementById('imagePreviewWrapper').style.display = 'none';
        input.click();
    }
</script>
@endsection
