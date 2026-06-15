<?php

namespace App\Filament\Resources\Pinjaman\Pages;

use App\Filament\Resources\Pinjaman\PinjamanResource;
use App\Models\Pinjaman;
use Filament\Resources\Pages\CreateRecord;

class CreatePinjaman extends CreateRecord
{
    protected static string $resource = PinjamanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $anggota = auth()->user()?->anggota;

        if (! $anggota) {
            throw ValidationException::withMessages([
                'anggota' => 'Data anggota tidak ditemukan.',
            ]);
        }

        $jumlahPinjaman = (float) preg_replace(
            '/[^0-9]/',
            '',
            $data['jumlah_pinjaman'] ?? 0
        );

        $bunga = (float) ($data['persentase_bunga'] ?? 0);

        $tenor = max(
            (int) ($data['jangka_waktu'] ?? 1),
            1
        );

        $totalBunga = $jumlahPinjaman * ($bunga / 100);

        $totalPinjaman = $jumlahPinjaman + $totalBunga;

        $angsuranPerBulan = $totalPinjaman / $tenor;

        $data['anggota_id'] = $anggota->id;

        $data['kode_pinjaman'] =
            'PJM-' .
            now()->format('Ymd') .
            '-' .
            str_pad(
                (string) (Pinjaman::count() + 1),
                5,
                '0',
                STR_PAD_LEFT
            );

        $data['tanggal_pengajuan'] =
            now()->toDateString();

        // Pengajuan baru disimpan sebagai draft
        $data['status'] = 'draft';

        $data['total_bunga'] = $totalBunga;
        $data['total_pinjaman'] = $totalPinjaman;
        $data['angsuran_per_bulan'] = $angsuranPerBulan;

        return $data;
    }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
