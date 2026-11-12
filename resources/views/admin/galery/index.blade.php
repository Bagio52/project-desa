@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <!-- Page Header & Action -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">
                <i class="bi bi-images me-2 text-primary"></i>Kelola Galeri Foto
            </h4>
            <p class="text-muted small mb-0">Kelola dokumentasi kegiatan, potensi, dan pemandangan Desa Ngendrosari</p>
        </div>
        <a href="{{ route('admin.galery.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah Foto Baru</span>
        </a>
    </div>

    <!-- Data Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="admin-card-title">
                <i class="bi bi-collection text-primary"></i> Koleksi Galeri
            </h5>
            <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill">
                Total: {{ count($galeries) }} Foto
            </span>
        </div>

        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 60px;" class="text-center">No</th>
                        <th style="width: 90px;" class="text-center">Foto</th>
                        <th>Nama Kegiatan / Objek</th>
                        <th>Deskripsi</th>
                        <th style="width: 120px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($galeries as $index => $galery)
                        <tr>
                            <td class="text-center text-muted fw-semibold">{{ $index + 1 }}</td>
                            <td class="text-center">
                                @if ($galery->gambar)
                                    <img src="{{ asset('storage/' . $galery->gambar) }}" alt="{{ $galery->nama }}" class="table-thumbnail">
                                @else
                                    <div class="table-thumbnail d-flex align-items-center justify-content-center bg-light text-muted">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark mb-1">{{ $galery->nama }}</div>
                                <div class="text-muted small">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $galery->created_at ? $galery->created_at->format('d M Y, H:i') : '-' }} WIB
                                </div>
                            </td>
                            <td>
                                <div class="text-clamp-2 text-muted small">
                                    {{ $galery->deskripsi ?? '-' }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.galery.edit', $galery->id) }}" 
                                       class="btn-action-edit" 
                                       title="Edit Galeri" 
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.galery.destroy', $galery->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto: &quot;{{ $galery->nama }}&quot;?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action-delete" title="Hapus Foto" data-bs-toggle="tooltip">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="py-4">
                                    <i class="bi bi-images text-muted" style="font-size: 3.5rem;"></i>
                                    <h6 class="fw-bold text-dark mt-3">Belum Ada Foto Galeri</h6>
                                    <p class="text-muted small">Unggah dokumentasi foto pertama Anda untuk mempercantik galeri website desa.</p>
                                    <a href="{{ route('admin.galery.create') }}" class="btn-admin-primary mt-2">
                                        <i class="bi bi-plus-lg"></i> Tambah Foto Baru
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
