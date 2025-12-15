@extends('layouts.admin')

@section('content')
    <section id=berita class="berita section">
        <div class="container">
            <h2>Kelola Berita</h2>
        </div>
        <div class="mb-3 text left">
            <a href="{{ route('admin.berita.create') }}" class="btn btn-outline-warning bi bi-plus-square" id="openForm">
                Tambah Berita</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beritas as $berita)
                        <tr>
                            <td>{{ $berita->judul }}</td>

                            <td>
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                    width="40">
                            </td>

                            <td>{{ $berita->deskripsi }}</td>

                            <td>
                                <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                    class="btn btn-outline-warning bi bi-pencil-square"></a>

                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
