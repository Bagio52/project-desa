@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h3 class="mb-3">Edit galery</h3>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.galery.update', $galery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $galery->nama }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control" required>{{ $galery->deskripsi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" id="gambar" name="gambar" class="form-control">

                        @if ($galery->gambar)
                            <img src="{{ asset('storage/' . $galery->gambar) }}" width="120" class="mt-2">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
