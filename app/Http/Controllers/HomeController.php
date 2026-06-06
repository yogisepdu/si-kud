<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Pengumuman;
use App\Models\Profile;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $sliders = Slider::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $profile = Profile::first();

        $pengumuman = Pengumuman::where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $galleries = Gallery::where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        // dd($sliders);
        // dd($sliders->pluck('image'));
        // dd(
        //     Storage::disk('public')->exists(
        //         'sliders/01KTER0W483KVB610FFAC10S8J.png'
        //     )
        // );

        return view('home', compact('berita', 'sliders', 'profile', 'pengumuman', 'galleries'));
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
