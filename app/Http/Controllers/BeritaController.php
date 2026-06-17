<?php

namespace App\Http\Controllers;

use App\Models\Berita;
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
        $berita = Berita::where('is_publish', true)
            ->latest('tanggal')
            ->get();

        return view('section/berita', compact('berita'));
    }

    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('is_publish', true)
            ->firstOrFail();

        $sessionKey = 'berita_viewed_' . $berita->id;

        if (! session()->has($sessionKey)) {

            $berita->increment('views');

            session()->put($sessionKey, true);
        }

        $beritaLainnya = Berita::where('id', '!=', $berita->id)
            ->where('is_publish', true)
            ->latest('tanggal')
            ->take(5)
            ->get();

        return view('section/detail-berita', compact(
            'berita',
            'beritaLainnya'
        ));
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
