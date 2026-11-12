@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0" style="max-width: 900px;">
    <!-- Page Header & Back Button -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">
                <i class="bi bi-pencil-square me-2 text-primary"></i>Edit Berita
            </h4>
            <p class="text-muted small mb-0">Perbarui konten dan informasi berita yang sudah dipublikasikan</p>
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
                <i class="bi bi-pencil-fill text-primary"></i> Formulir Perubahan Berita
            </h5>
            <span class="badge bg-light text-muted border px-3 py-1">ID #{{ $berita->id }}</span>
        </div>

        <div class="admin-card-body">
            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul Berita -->
                <div class="mb-4">
                    <label for="judul" class="form-label">
                        Judul Berita <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           id="judul" 
                           name="judul" 
                           class="form-control @error('judul') is-invalid @enderror" 
                           placeholder="Masukkan judul berita" 
                           value="{{ old('judul', $berita->judul) }}" 
                           required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar Berita -->
                <div class="mb-4">
                    <label class="form-label">Foto / Sampul Berita</label>
                    
                    <div class="row g-3 align-items-start">
                        <!-- Current Image Display -->
                        @if ($berita->gambar)
                            <div class="col-md-5">
                                <label class="text-muted small fw-semibold d-block mb-1">Foto Saat Ini:</label>
                                <div class="image-preview-box">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                                </div>
                            </div>
                        @endif

                        <!-- Upload New Image -->
                        <div class="{{ $berita->gambar ? 'col-md-7' : 'col-12' }}">
                            <label class="text-muted small fw-semibold d-block mb-1">
                                {{ $berita->gambar ? 'Ganti Foto Baru (Opsional):' : 'Pilih Foto:' }}
                            </label>
                            
                            <div class="image-upload-zone" onclick="document.getElementById('gambarInput').click();">
                                <div class="upload-icon">
                                    <i class="bi bi-cloud-arrow-up text-primary"></i>
                                </div>
                                <h6 class="upload-title">Klik untuk memilih foto pengganti</h6>
                                <p class="upload-subtitle">Format: JPG, PNG, GIF (Maks. 2MB)</p>
                                <input type="file" 
                                       id="gambarInput" 
                                       name="gambar" 
                                       class="d-none @error('gambar') is-invalid @enderror" 
                                       accept="image/*" 
                                       onchange="previewImage(this)">
                            </div>

                            @error('gambar')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror

                            <!-- Preview for New Selected Image -->
                            <div id="imagePreviewWrapper" class="image-preview-container">
                                <div class="mt-2 p-2 bg-light rounded border d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                        <span id="fileName" class="small fw-semibold text-dark"></span>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2" onclick="clearPreview()">
                                        Batal Ganti
                                    </button>
                                </div>
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
                              placeholder="Masukkan deskripsi berita" 
                              required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
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
                        <i class="bi bi-check2-circle"></i> Simpan Perubahan
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
            document.getElementById('fileName').textContent = file.name + ' (' + Math.round(file.size / 1024) + ' KB)';
            document.getElementById('imagePreviewWrapper').style.display = 'block';
        }
    }

    function clearPreview() {
        const input = document.getElementById('gambarInput');
        input.value = '';
        document.getElementById('imagePreviewWrapper').style.display = 'none';
    }
</script>
@endsection
