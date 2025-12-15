@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h3 class="mb-3">Edit Berita</h3>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" id="judul" name="judul" class="form-control" value="{{ $berita->judul }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" id="gambar" name="gambar" class="form-control">

                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" width="120" class="mt-2">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control" required>{{ $berita->deskripsi }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
