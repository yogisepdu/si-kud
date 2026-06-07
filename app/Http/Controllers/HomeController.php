<?php

namespace App\Http\Controllers;

use App\Models\Berita;
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
        $berita = Berita::where('is_publish', true)
            ->latest('tanggal')
            ->get();

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
