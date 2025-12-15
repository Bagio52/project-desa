@extends('layouts.admin')

@section('content')
    <section id=galery class="galery section">
        <div class="container">
            <h2>Kelola Galery</h2>
        </div>
        <div class="mb-3 text left">
            <a href="{{ route('admin.galery.create') }}" class="btn btn-outline-warning bi bi-plus-square" id="openForm">
                Tambah</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeries as $galery)
                        <tr>
                            <td>{{ $galery->nama }}</td>

                            <td>{{ $galery->deskripsi }}</td>

                            <td>
                                <img src="{{ asset('storage/' . $galery->gambar) }}" alt="{{ $galery->nama }}"
                                    width="40">
                            </td>

                            <td>
                                <a href="{{ route('admin.galery.edit', $galery->id) }}"
                                    class="btn btn-outline-warning bi bi-pencil-square"></a>

                                <form action="{{ route('admin.galery.destroy', $galery->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus galery ini?')">
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
