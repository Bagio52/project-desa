@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0" style="max-width: 900px;">
    <!-- Page Header & Back Button -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">
                <i class="bi bi-pencil-square me-2 text-primary"></i>Edit Foto Galeri
            </h4>
            <p class="text-muted small mb-0">Perbarui informasi atau ganti file foto dokumentasi desa</p>
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
                <i class="bi bi-image-fill text-primary"></i> Formulir Perubahan Galeri
            </h5>
            <span class="badge bg-light text-muted border px-3 py-1">ID #{{ $galery->id }}</span>
        </div>

        <div class="admin-card-body">
            <form action="{{ route('admin.galery.update', $galery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Foto -->
                <div class="mb-4">
                    <label for="nama" class="form-label">
                        Nama / Judul Foto <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           class="form-control @error('nama') is-invalid @enderror" 
                           placeholder="Masukkan nama foto" 
                           value="{{ old('nama', $galery->nama) }}" 
                           required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Foto Galeri -->
                <div class="mb-4">
                    <label class="form-label">File Foto Dokumentasi</label>
                    
                    <div class="row g-3 align-items-start">
                        <!-- Current Image Display -->
                        @if ($galery->gambar)
                            <div class="col-md-5">
                                <label class="text-muted small fw-semibold d-block mb-1">Foto Saat Ini:</label>
                                <div class="image-preview-box">
                                    <img src="{{ asset('storage/' . $galery->gambar) }}" alt="{{ $galery->nama }}">
                                </div>
                            </div>
                        @endif

                        <!-- Upload New Image -->
                        <div class="{{ $galery->gambar ? 'col-md-7' : 'col-12' }}">
                            <label class="text-muted small fw-semibold d-block mb-1">
                                {{ $galery->gambar ? 'Ganti Foto Baru (Opsional):' : 'Pilih Foto:' }}
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

                <!-- Deskripsi Foto -->
                <div class="mb-4">
                    <label for="deskripsi" class="form-label">
                        Deskripsi / Keterangan Foto <span class="text-danger">*</span>
                    </label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="4" 
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              placeholder="Masukkan deskripsi foto" 
                              required>{{ old('deskripsi', $galery->deskripsi) }}</textarea>
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
