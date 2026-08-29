<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galery;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Kelola Berita
    public function index()
    {
        $beritas = Berita::all();

        return view('admin.berita.index', compact('beritas'));
    }
    public function create()
    {
        return view('admin.berita.create');
    }
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string'
        ]);

        $path = $request->file('gambar')->store('images', 'public');;

        Berita::create([
            'judul' => $request->judul,
            'gambar' => $path,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $berita = Berita::findOrfail($id);

        return view('admin.berita.edit', compact('berita'));
    }
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string'
        ]);
        // Jika uplod gambar baru
        $berita = Berita::findOrfail($id);
        //hapus gambar lama
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && file_exists(public_path('storage/' . $berita->gambar))) {
                unlink(public_path('storage/' . $berita->gambar));
            }
            // Simpan gambar baru
            $path = $request->file('gambar')->store('images', 'public');
            $berita->gambar = $path;
        }

        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file gambar
        if ($berita->gambar && file_exists(public_path('storage/' . $berita->gambar))) {
            unlink(public_path('storage/' . $berita->gambar));
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }


    //Kelola Galery
    public function galeryIndex()
    {
        // Implementasi untuk menampilkan galeri
        $galeries = Galery::all();

        return view('admin.galery.index', compact('galeries'));
    }

    public function galeryCreate()
    {
        // Implementasi untuk menampilkan form pembuatan galeri baru
        return view('admin.galery.create');
    }

    public function galeryStore(Request $request)
    {
        // Implementasi untuk menyimpan galeri baru
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $path = $request->file('gambar')->store('images', 'public');;

        Galery::create([
            'nama' => $request->nama,
            'gambar' => $path,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.galery.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function galeryEdit($id)
    {
        // Implementasi untuk menampilkan form edit galeri
        $galery = Galery::findOrfail($id);

        return view('admin.galery.edit', compact('galery'));
    }

    public function galeryUpdate(Request $request, $id)
    {
        // Implementasi untuk memperbarui galeri
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // Jika uplod gambar baru
        $galery = Galery::findOrfail($id);
        //hapus gambar lama
        if ($request->hasFile('gambar')) {
            if ($galery->gambar && file_exists(public_path('storage/' . $galery->gambar))) {
                unlink(public_path('storage/' . $galery->gambar));
            }
            // Simpan gambar baru
            $path = $request->file('gambar')->store('images', 'public');
            $galery->gambar = $path;
        }

        $galery->nama = $request->nama;
        $galery->deskripsi = $request->deskripsi;
        $galery->save();

        return redirect()->route('admin.galery.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function galeryDestroy($id)
    {
        $galery = Galery::findOrFail($id);

        // Hapus file gambar
        if ($galery->gambar && file_exists(public_path('storage/' . $galery->gambar))) {
            unlink(public_path('storage/' . $galery->gambar));
        }

        $galery->delete();

        return redirect()->route('admin.galery.index')
            ->with('success', 'Galery berhasil dihapus.');
    }
}
