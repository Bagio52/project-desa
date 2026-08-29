<?php

namespace Database\Seeders;

use App\Models\Galery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GalerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagesDir = storage_path('app/public/images');
        if (!File::exists($imagesDir)) {
            File::makeDirectory($imagesDir, 0755, true);
        }

        $existingFiles = File::files($imagesDir);
        $sampleImage = !empty($existingFiles) ? $existingFiles[0]->getRealPath() : null;

        $galeries = [
            [
                'nama' => 'Panorama Hamparan Persawahan Dusun Krajan',
                'deskripsi' => 'Keindahan pemandangan sawah terasering hijau nan asri dengan latar belakang perbukitan saat pagi hari.',
                'image_name' => 'galery_sawah.jpg',
            ],
            [
                'nama' => 'Gotong Royong Bersih Lingkungan Bersama Warga',
                'deskripsi' => 'Kebersamaan warga membersihkan fasilitas umum, selokan, dan jalan poros desa.',
                'image_name' => 'galery_gotong_royong.jpg',
            ],
            [
                'nama' => 'Pelayanan Balita di Posyandu Melati',
                'deskripsi' => 'Dokumentasi penimbangan balita dan edukasi pencegahan stunting oleh tim kader kesehatan desa.',
                'image_name' => 'galery_posyandu.jpg',
            ],
            [
                'nama' => 'Pameran Produk Olahan UMKM Desa',
                'deskripsi' => 'Beragam produk makanan ringan, keripik pisang, dan minuman herbal hasil karya kelompok ibu-ibu PKK.',
                'image_name' => 'galery_umkm.jpg',
            ],
            [
                'nama' => 'Senam Kebugaran Lansia Sehat Ceria',
                'deskripsi' => 'Kegiatan rutin senam pagi setiap hari Minggu di halaman balai desa diikuti para lansia.',
                'image_name' => 'galery_senam.jpg',
            ],
            [
                'nama' => 'Rapat Koordinasi Perangkat Desa dan BPD',
                'deskripsi' => 'Musyawarah rutin bulanan evaluasi pelayanan administrasi kependudukan dan program kerja desa.',
                'image_name' => 'galery_rapat.jpg',
            ],
            [
                'nama' => 'Pawai Budaya dan Karnaval Kesenian Desa',
                'deskripsi' => 'Karnaval kostum adat daerah dan kesenian musik tradisional memeriahkan peringatan hari jadi desa.',
                'image_name' => 'galery_karnaval.jpg',
            ],
            [
                'nama' => 'Pembangunan Tandon Air Bersih Dusun Selatan',
                'deskripsi' => 'Proses pengerjaan instalasi penampungan air bersih untuk mencukupi kebutuhan air minum warga.',
                'image_name' => 'galery_air_bersih.jpg',
            ],
            [
                'nama' => 'Pelatihan Kerajinan Tangan Anyaman Bambu',
                'deskripsi' => 'Ibu-ibu dan pemuda desa mengikuti pelatihan memproduksi tas dan wadah ramah lingkungan berbahan bambu.',
                'image_name' => 'galery_kerajinan.jpg',
            ],
            [
                'nama' => 'Sunset di Embung Wisata dan Rekreasi Desa',
                'deskripsi' => 'Suasana matahari terbenam yang memukau di kawasan embung penampungan air dan wisata pancing desa.',
                'image_name' => 'galery_embung.jpg',
            ],
        ];

        foreach ($galeries as $item) {
            $imagePath = 'images/' . $item['image_name'];
            $fullImagePath = storage_path('app/public/' . $imagePath);

            if (!File::exists($fullImagePath) && $sampleImage) {
                File::copy($sampleImage, $fullImagePath);
            }

            Galery::create([
                'nama' => $item['nama'],
                'deskripsi' => $item['deskripsi'],
                'gambar' => $imagePath,
            ]);
        }
    }
}
