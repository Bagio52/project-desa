@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0" style="max-width: 900px;">
    <!-- Page Header & Back Button -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">
                <i class="bi bi-cloud-plus me-2 text-primary"></i>Tambah Foto Galeri
            </h4>
            <p class="text-muted small mb-0">Unggah foto dokumentasi kegiatan atau potensi desa</p>
        </div>
        <a href="{{ route('admin.galery.index') }}" class="btn-admin-secondary">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="admin-card-title">
                <i class="bi bi-card-image text-primary"></i> Formulir Unggah Foto
            </h5>
            <span class="text-danger small">* Wajib diisi</span>
        </div>

        <div class="admin-card-body">
            <form action="{{ route('admin.galery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Foto -->
                <div class="mb-4">
                    <label for="nama" class="form-label">
                        Nama / Judul Foto <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           class="form-control @error('nama') is-invalid @enderror" 
                           placeholder="Contoh: Gotong Royong Warga Dusun Krajan" 
                           value="{{ old('nama') }}" 
                           required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Unggah Gambar -->
                <div class="mb-4">
                    <label for="gambarInput" class="form-label">
                        File Foto / Gambar <span class="text-danger">*</span>
                    </label>

                    <div class="image-upload-zone" onclick="document.getElementById('gambarInput').click();">
                        <div class="upload-icon">
                            <i class="bi bi-image text-primary"></i>
                        </div>
                        <h6 class="upload-title">Klik untuk memilih foto atau seret ke sini</h6>
                        <p class="upload-subtitle">Format: JPG, JPEG, PNG, GIF (Maks. 2MB)</p>
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
                                <img id="previewImg" src="#" alt="Pratinjau Foto">
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

                <!-- Deskripsi Foto -->
                <div class="mb-4">
                    <label for="deskripsi" class="form-label">
                        Deskripsi / Keterangan Foto <span class="text-danger">*</span>
                    </label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="4" 
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              placeholder="Tuliskan keterangan singkat mengenai dokumentasi foto ini..." 
                              required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('admin.galery.index') }}" class="btn-admin-secondary">
                        <i class="bi bi-x-lg"></i> Batal
                    </a>
                    <button type="submit" class="btn-admin-primary">
                        <i class="bi bi-check-lg"></i> Simpan Foto
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
