<?php

namespace App\Observers;

use App\Models\Angsuran;
use App\Models\Pinjaman;
use Illuminate\Support\Facades\Storage;

class PinjamanObserver
{
    /**
     * Handle the Pinjaman "created" event.
     */

    protected array $fileFields = [
        'file_ktp',
        'file_kk',
        'file_bukti_penghasilan',
        'file_agunan',
        'file_dokumen_pendukung',
    ];

    public function created(Pinjaman $pinjaman): void
    {
        //
    }

    /**
     * Handle the Pinjaman "updated" event.
     */
    public function updated(Pinjaman $pinjaman): void
    {
        // Hapus file lama jika diganti
        foreach ($this->fileFields as $field) {

            if ($pinjaman->isDirty($field)) {

                $oldFile = $pinjaman->getOriginal($field);

                if (
                    $oldFile &&
                    Storage::disk('public')->exists($oldFile)
                ) {
                    Storage::disk('public')->delete($oldFile);
                }
            }
        }

        // Generate angsuran saat pinjaman disetujui
        if (
            $pinjaman->wasChanged('status')
            && $pinjaman->status === 'disetujui'
            && $pinjaman->angsurans()->doesntExist()
        ) {

            $tanggalMulai = $pinjaman->approved_at
                ? $pinjaman->approved_at
                : now();

            for ($i = 1; $i <= $pinjaman->jangka_waktu; $i++) {

                Angsuran::create([
                    'pinjaman_id' => $pinjaman->id,
                    'angsuran_ke' => $i,
                    'jatuh_tempo' => $tanggalMulai->copy()->addMonths($i),
                    'nominal' => $pinjaman->angsuran_per_bulan,
                    'status' => 'belum_bayar',
                ]);
            }
        }
    }

    /**
     * Handle the Pinjaman "deleted" event.
     */
    public function deleted(Pinjaman $pinjaman): void
    {
        //
        foreach ($this->fileFields as $field) {

            if (
                $pinjaman->$field &&
                Storage::disk('public')->exists($pinjaman->$field)
            ) {
                Storage::disk('public')->delete($pinjaman->$field);
            }
        }
    }

    /**
     * Handle the Pinjaman "restored" event.
     */
    public function restored(Pinjaman $pinjaman): void
    {
        //
    }

    /**
     * Handle the Pinjaman "force deleted" event.
     */
    public function forceDeleted(Pinjaman $pinjaman): void
    {
        //
    }
}
