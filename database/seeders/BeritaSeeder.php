<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BeritaSeeder extends Seeder
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

        // Cari file gambar yang sudah ada untuk dijadikan template/fallback
        $existingFiles = File::files($imagesDir);
        $sampleImage = !empty($existingFiles) ? $existingFiles[0]->getRealPath() : null;

        $beritas = [
            [
                'judul' => 'Musyawarah Perencanaan Pembangunan Desa (Musrenbangdes) Tahun 2026',
                'deskripsi' => 'Pemerintah Desa bersama BPD dan tokoh masyarakat menggelar Musrenbangdes untuk menetapkan prioritas pembangunan infrastruktur, pemberdayaan ekonomi masyarakat, dan peningkatan layanan kesehatan.',
                'image_name' => 'berita_musrenbang.jpg',
            ],
            [
                'judul' => 'Penyaluran Bantuan Langsung Tunai Dana Desa (BLT-DD) Tahap I',
                'deskripsi' => 'Penyaluran bantuan langsung tunai berlangsung tertib di Balai Desa bagi keluarga penerima manfaat guna membantu pemenuhan kebutuhan pokok sehari-hari.',
                'image_name' => 'berita_blt.jpg',
            ],
            [
                'judul' => 'Kerja Bakti Massal Gotong Royong Normalisasi Saluran Irigasi',
                'deskripsi' => 'Warga secara serentak melaksanakan gotong royong membersihkan saluran irigasi sawah untuk memastikan pasokan air lancar menjelang musim tanam serentak.',
                'image_name' => 'berita_gotong_royong.jpg',
            ],
            [
                'judul' => 'Pelatihan Digital Marketing dan Desain Kemasan Produk UMKM Desa',
                'deskripsi' => 'Dinas Koperasi bekerjasama dengan Pemdes mengadakan workshop pembuatan foto produk, logo kemasan, dan penjualan online melalui marketplace untuk pelaku UMKM lokal.',
                'image_name' => 'berita_umkm.jpg',
            ],
            [
                'judul' => 'Layanan Kesehatan Posyandu Balita dan Cek Kesehatan Rutin Lansia',
                'deskripsi' => 'Kader Posyandu bersama bidan desa memberikan layanan penimbangan berat badan balita, imunisasi dasar, serta cek gula darah dan tensi gratis bagi warga lansia.',
                'image_name' => 'berita_posyandu.jpg',
            ],
            [
                'judul' => 'Panen Raya Padi Organik Kelompok Tani Makmur Sejahtera',
                'deskripsi' => 'Kelompok Tani binaan desa sukses melakukan panen raya padi organik dengan peningkatan produktivitas mencapai 20% dibanding musim tanam tahun lalu.',
                'image_name' => 'berita_panen.jpg',
            ],
            [
                'judul' => 'Pentas Seni Tradisional dan Gelar Budaya Bersih Dusun',
                'deskripsi' => 'Masyarakat menampilkan beragam kesenian tari tradisional, reog, dan wayang kulit sebagai bentuk pelestarian warisan budaya leluhur desa.',
                'image_name' => 'berita_budaya.jpg',
            ],
            [
                'judul' => 'Pembangunan dan Pengaspalan Jalan Usaha Tani Dusun Krajan',
                'deskripsi' => 'Realisasi anggaran dana desa dialokasikan untuk mempermudah akses pengangkutan hasil panen pertanian warga di Dusun Krajan.',
                'image_name' => 'berita_jalan.jpg',
            ],
            [
                'judul' => 'Turnamen Bola Voli Antar-RW Meriahkan Peringatan HUT RI',
                'deskripsi' => 'Kompetisi olahraga voli antar dusun/RW disambut antusias oleh para pemuda dan warga untuk mempererat tali persaudaraan dan sportivitas.',
                'image_name' => 'berita_turnamen.jpg',
            ],
            [
                'judul' => 'Peresmian Unit Usaha BUMDes dan Gerai Sentra Oleh-oleh Khas Desa',
                'deskripsi' => 'Kepala Desa resmi membuka sentra oleh-oleh BUMDes yang menampung beragam produk olahan keripik, madu hutan, dan kerajinan tangan warga.',
                'image_name' => 'berita_bumdes.jpg',
            ],
        ];

        foreach ($beritas as $item) {
            $imagePath = 'images/' . $item['image_name'];
            $fullImagePath = storage_path('app/public/' . $imagePath);

            // Jika file belum ada, salin dari sampleImage yang sudah ada
            if (!File::exists($fullImagePath) && $sampleImage) {
                File::copy($sampleImage, $fullImagePath);
            }

            Berita::create([
                'judul' => $item['judul'],
                'deskripsi' => $item['deskripsi'],
                'gambar' => $imagePath,
            ]);
        }
    }
}
