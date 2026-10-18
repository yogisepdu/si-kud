<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AnggotaRegisterController extends Controller
{
    public function create()
    {
        return view('auth.anggota-register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'nik' => [
                'required',
                'digits:16',
                'unique:anggotas,nik',
            ],

            'no_hp' => [
                'required',
                'string',
                'max:20',
            ],

            'tempat_lahir' => [
                'required',
                'string',
                'max:255',
            ],

            'tanggal_lahir' => [
                'required',
                'date',
            ],

            'jenis_kelamin' => [
                'required',
                Rule::in([
                    'Laki-laki',
                    'Perempuan',
                ]),
            ],
        ]);

        DB::transaction(function () use ($validated) {

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => User::ANGGOTA,
                'status' => 'pending',
            ]);

            Anggota::create([
                'user_id' => $user->id,

                'no_anggota' => $this->generateNoAnggota(),

                'nik' => $validated['nik'],

                'tempat_lahir' => $validated['tempat_lahir'],

                'tanggal_lahir' => $validated['tanggal_lahir'],

                'jenis_kelamin' => $validated['jenis_kelamin'],

                'no_hp' => $validated['no_hp'],

                // Data lainnya akan dilengkapi oleh anggota
                // melalui panel anggota atau oleh administrator.
                'alamat' => null,
                'jenis_petani' => null,
                'luas_lahan' => null,
                'blok_kebun' => null,

                'tanggal_bergabung' => now()->toDateString(),

                'status' => 'Aktif',
            ]);
        });

        return redirect()
            ->route('anggota.register.success')
            ->with(
                'registration_success',
                'Pendaftaran berhasil. Akun Anda sedang menunggu persetujuan Administrator.'
            );
    }

    private function generateNoAnggota(): string
    {
        $lastId = Anggota::query()->max('id') ?? 0;

        return 'AGT-' . str_pad(
            $lastId + 1,
            6,
            '0',
            STR_PAD_LEFT
        );
    }

    public function success()
    {
        return view('auth.anggota-register-success');
    }
}
