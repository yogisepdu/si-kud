<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('section/menu_produk');
    }

    public function layananPupuk()
    {
        return view('section/produk', [
            'judul' => 'Layanan Pupuk',
            'isi' => '
                <p>
                    KUD Kampar menyediakan layanan distribusi pupuk untuk memenuhi kebutuhan anggota
                    dalam menunjang produktivitas perkebunan dan pertanian.
                </p>

                <h3>Manfaat Layanan</h3>

                <p>1. Menyediakan pupuk berkualitas.</p>
                <p>2. Harga lebih terjangkau bagi anggota.</p>
                <p>3. Ketersediaan stok lebih terjamin.</p>
                <p>4. Mendukung peningkatan hasil panen.</p>
            '
        ]);
    }

    public function layananTbs()
    {
        return view('section/produk', [
            'judul' => 'Layanan TBS',
            'isi' => '
                <p>
                    KUD Kampar melayani pengelolaan dan pemasaran Tandan Buah Segar (TBS)
                    dari anggota kepada pabrik kelapa sawit mitra.
                </p>

                <h3>Keunggulan Layanan</h3>

                <p>1. Timbangan yang transparan.</p>
                <p>2. Harga mengikuti ketentuan yang berlaku.</p>
                <p>3. Pembayaran yang jelas dan teratur.</p>
                <p>4. Mendukung pemasaran hasil kebun anggota.</p>
            '
        ]);
    }

    public function layananSimpanPinjam()
    {
        return view('section/produk', [
            'judul' => 'Layanan Simpan Pinjam',
            'isi' => '
                <p>
                    Unit Simpan Pinjam KUD Kampar hadir untuk membantu anggota dalam
                    memperoleh akses pembiayaan dan pengelolaan simpanan.
                </p>

                <h3>Fasilitas</h3>

                <p>1. Simpanan anggota.</p>
                <p>2. Pinjaman modal usaha.</p>
                <p>3. Angsuran yang mudah.</p>
                <p>4. Proses pelayanan yang cepat dan transparan.</p>
            '
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
