<?php

namespace App\Services;

use App\Models\Anggota;
use Carbon\Carbon;

class LaporanBulananService
{
    public function getData(int $bulan, int $tahun)
    {
        return Anggota::query()
            ->with([
                'user',
                'simpanans.items',
                'pinjamans.angsurans',
            ])
            ->get()
            ->map(function ($anggota) use ($bulan, $tahun) {

                /*
                |--------------------------------------------------------------------------
                | SIMPANAN
                |--------------------------------------------------------------------------
                */

                $simpanan = $anggota->simpanans
                    ->where('status', 'terverifikasi')
                    ->filter(function ($item) use ($bulan, $tahun) {

                        return Carbon::parse($item->tanggal)->month == $bulan
                            && Carbon::parse($item->tanggal)->year == $tahun;
                    });

                $totalSimpanan = $simpanan
                    ->flatMap->items
                    ->sum('jumlah');

                /*
                |--------------------------------------------------------------------------
                | PINJAMAN
                |--------------------------------------------------------------------------
                */

                $pinjaman = $anggota->pinjamans
                    ->where('status', 'disetujui')
                    ->filter(function ($item) use ($bulan, $tahun) {
                        return Carbon::parse($item->tanggal_pengajuan)->month == $bulan
                            && Carbon::parse($item->tanggal_pengajuan)->year == $tahun;
                    });

                $totalPinjaman = $pinjaman->sum('jumlah_pinjaman');

                /*
                |--------------------------------------------------------------------------
                | ANGSURAN
                |--------------------------------------------------------------------------
                */

                $angsuran = $anggota->pinjamans
                    ->where('status', 'disetujui')
                    ->flatMap->angsurans
                    ->where('status', 'dibayar')
                    ->filter(function ($item) use ($bulan, $tahun) {

                        if (blank($item->tanggal_bayar)) {
                            return false;
                        }

                        return Carbon::parse($item->tanggal_bayar)->month == $bulan
                            && Carbon::parse($item->tanggal_bayar)->year == $tahun;
                    });

                $totalAngsuran = $angsuran->sum('nominal');

                /*
                |--------------------------------------------------------------------------
                | SISA PINJAMAN
                |--------------------------------------------------------------------------
                */

                $seluruhPinjaman = $anggota->pinjamans
                    ->where('status', 'disetujui');

                $totalPinjamanAktif = $seluruhPinjaman
                    ->sum('jumlah_pinjaman');

                $totalAngsuranSemua = $seluruhPinjaman
                    ->flatMap->angsurans
                    ->where('status', 'dibayar')
                    ->sum('nominal');

                $sisaPinjaman = max(
                    0,
                    $totalPinjamanAktif - $totalAngsuranSemua
                );

                return (object) [

                    'id' => $anggota->id,

                    'kode' => $anggota->no_anggota,

                    'nama' => $anggota->nama,

                    'total_simpanan' => $totalSimpanan,

                    'total_pinjaman' => $totalPinjaman,

                    'total_angsuran' => $totalAngsuran,

                    'sisa_pinjaman' => $sisaPinjaman,

                ];
            });
    }

    public function getPeriode(int $bulan, int $tahun): string
    {
        return Carbon::create(
            $tahun,
            $bulan,
            1
        )->translatedFormat('F Y');
    }
}