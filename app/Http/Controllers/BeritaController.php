<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function berita()
    {
        $berita = [
            [
                'slug' => 'layanan-pupuk-kud-kampar',
                'judul' => 'Layanan Pupuk KUD Kampar',
                'tanggal' => '04 Juni 2026',
                'gambar' => 'imsakiyah_2025.jpg',
                'ringkasan' => 'KUD Kampar terus meningkatkan pelayanan distribusi pupuk bagi anggota.'
            ],

            [
                'slug' => 'pelayanan-tbs-kud-kampar',
                'judul' => 'Pelayanan TBS KUD Kampar',
                'tanggal' => '02 Juni 2026',
                'gambar' => 'pengumuman_perubahan_nama_13_2_2025.png',
                'ringkasan' => 'Pelayanan penerimaan dan pengelolaan TBS anggota berjalan lancar.'
            ],

            [
                'slug' => 'rapat-anggota-tahunan',
                'judul' => 'Rapat Anggota Tahunan KUD Kampar',
                'tanggal' => '25 Mei 2026',
                'gambar' => 'rupslb16_12_2024.jpg',
                'ringkasan' => 'Pelaksanaan RAT sebagai bentuk pertanggungjawaban pengurus kepada anggota.'
            ],
        ];

        return view('section/berita', compact('berita'));
    }

    public function detailBerita($slug)
    {
        $berita = [

            'layanan-pupuk-kud-kampar' => [
                'judul' => 'Layanan Pupuk KUD Kampar',
                'tanggal' => '04 Juni 2026',
                'gambar' => 'imsakiyah_2025.jpg',
                'isi' => '
                    <p>KUD Kampar menyediakan layanan distribusi pupuk untuk seluruh anggota koperasi.</p>

                    <p>Layanan ini bertujuan membantu anggota memperoleh pupuk berkualitas dengan harga yang terjangkau.</p>

                    <p>Ketersediaan pupuk yang memadai diharapkan mampu meningkatkan produktivitas perkebunan anggota.</p>
                '
            ],

            'pelayanan-tbs-kud-kampar' => [
                'judul' => 'Pelayanan TBS KUD Kampar',
                'tanggal' => '02 Juni 2026',
                'gambar' => 'pengumuman_perubahan_nama_13_2_2025.png',
                'isi' => '
                    <p>KUD Kampar terus meningkatkan kualitas pelayanan Tandan Buah Segar (TBS).</p>

                    <p>Seluruh proses penimbangan dilakukan secara transparan dan akuntabel.</p>
                '
            ],

            'rapat-anggota-tahunan' => [
                'judul' => 'Rapat Anggota Tahunan KUD Kampar',
                'tanggal' => '25 Mei 2026',
                'gambar' => 'rupslb16_12_2024.jpg',
                'isi' => '
                    <p>RAT merupakan agenda tahunan yang wajib dilaksanakan oleh koperasi.</p>

                    <p>Dalam kegiatan ini disampaikan laporan pertanggungjawaban pengurus dan pengawas kepada anggota.</p>
                '
            ],

        ];

        if (!isset($berita[$slug])) {
            abort(404);
        }

        return view('section/detail-berita', [
            'berita' => $berita[$slug]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
