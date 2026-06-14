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
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();

            $table->foreignId('anggota_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('kode_pinjaman')->unique();

            $table->date('tanggal_pengajuan');

            $table->decimal('jumlah_pinjaman', 15, 2);

            $table->integer('jangka_waktu');

            $table->decimal('persentase_bunga', 5, 2);

            $table->decimal('total_bunga', 15, 2)
                ->default(0);

            $table->decimal('total_pinjaman', 15, 2)
                ->default(0);

            $table->decimal('angsuran_per_bulan', 15, 2)
                ->default(0);

            $table->text('tujuan_pinjaman');

            $table->enum('status', [
                'draft',
                'menunggu',
                'disetujui',
                'ditolak',
                'lunas',
            ])->default('draft');

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('approved_at')
                ->nullable();

            $table->text('catatan_pimpinan')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamen');
    }
};
