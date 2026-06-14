<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pinjaman_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('angsuran_ke');

            $table->date('jatuh_tempo');

            $table->decimal('nominal', 15, 2);

            $table->date('tanggal_bayar')
                ->nullable();

            $table->string('bukti_bayar')
                ->nullable();

            $table->enum('status', [
                'belum_bayar',
                'menunggu_verifikasi',
                'dibayar',
                'ditolak',
            ])->default('belum_bayar');

            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('verified_at')
                ->nullable();

            $table->text('catatan_verifikasi')
                ->nullable();

            $table->unique([
                'pinjaman_id',
                'angsuran_ke',
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angsurans');
    }
};
