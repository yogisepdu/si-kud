<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function index()
    // {
    //     return view('auth.login');
    // }

    public function index()
    {
        if (Auth::check()) {

            $user = Auth::user();

            return match ($user->role) {
                'administrator' => redirect('/admin'),
                'pimpinan'      => redirect('/pimpinan'),
                'anggota'       => redirect('/anggota'),
                default         => redirect('/'),
            };
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = \App\Models\User::where('email', $credentials['email'])->first();

        /*
    |--------------------------------------------------------------------------
    | Cek akun berdasarkan status
    |--------------------------------------------------------------------------
    */

        if ($user) {

            if ($user->status === 'pending') {
                return back()->withErrors([
                    'email' => 'Pendaftaran Anda masih menunggu persetujuan Administrator.',
                ]);
            }

            if ($user->status === 'rejected') {
                return back()->withErrors([
                    'email' => 'Pendaftaran Anda ditolak oleh Administrator. Silakan hubungi pihak KUD untuk informasi lebih lanjut.',
                ]);
            }
        }

        /*
    |--------------------------------------------------------------------------
    | Proses Login
    |--------------------------------------------------------------------------
    */

        if (Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect('/admin');
            }

            if ($user->isPimpinan()) {
                return redirect('/pimpinan');
            }

            if ($user->isAnggota()) {
                return redirect('/anggota');
            }

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
