<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KritikSaranController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'judul' => 'nullable|string|max:255',
                'pesan' => 'required|string',
            ],
            [
                'nama.required' => 'Nama lengkap wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'pesan.required' => 'Kritik atau saran wajib diisi.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            KritikSaran::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'judul' => $request->judul,
                'pesan' => $request->pesan,
                'dibaca' => false,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Kritik dan saran berhasil dikirim. Terima kasih atas masukan Anda.',
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
