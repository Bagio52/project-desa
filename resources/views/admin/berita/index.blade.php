@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <!-- Page Header & Action -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">
                <i class="bi bi-newspaper me-2 text-primary"></i>Kelola Berita
            </h4>
            <p class="text-muted small mb-0">Kelola dan publikasikan informasi serta kegiatan terkini Desa Ngendrosari</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah Berita Baru</span>
        </a>
    </div>

    <!-- Data Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="admin-card-title">
                <i class="bi bi-card-list text-primary"></i> Daftar Berita
            </h5>
            <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill">
                Total: {{ count($beritas) }} Berita
            </span>
        </div>

        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 60px;" class="text-center">No</th>
                        <th style="width: 90px;" class="text-center">Gambar</th>
                        <th>Judul & Tanggal</th>
                        <th>Deskripsi</th>
                        <th style="width: 120px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($beritas as $index => $berita)
                        <tr>
                            <td class="text-center text-muted fw-semibold">{{ $index + 1 }}</td>
                            <td class="text-center">
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="table-thumbnail">
                                @else
                                    <div class="table-thumbnail d-flex align-items-center justify-content-center bg-light text-muted">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark mb-1">{{ $berita->judul }}</div>
                                <div class="text-muted small">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $berita->created_at ? $berita->created_at->format('d M Y, H:i') : '-' }} WIB
                                </div>
                            </td>
                            <td>
                                <div class="text-clamp-2 text-muted small">
                                    {{ $berita->deskripsi }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.berita.edit', $berita->id) }}" 
                                       class="btn-action-edit" 
                                       title="Edit Berita" 
                                       data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita: &quot;{{ $berita->judul }}&quot;?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action-delete" title="Hapus Berita" data-bs-toggle="tooltip">
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
                                    <i class="bi bi-folder-x text-muted" style="font-size: 3.5rem;"></i>
                                    <h6 class="fw-bold text-dark mt-3">Belum Ada Berita</h6>
                                    <p class="text-muted small">Silakan tambahkan berita pertama Anda untuk ditampilkan di website.</p>
                                    <a href="{{ route('admin.berita.create') }}" class="btn-admin-primary mt-2">
                                        <i class="bi bi-plus-lg"></i> Tambah Berita
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
