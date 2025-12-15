@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <h3 class="mb-4">Tambah Foto</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.galery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="form-control" placeholder="Masukkan deskripsi foto" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </form>

        </div>
    </div>

</div>

@endsection
