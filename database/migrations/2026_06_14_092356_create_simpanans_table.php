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
        Schema::create('simpanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('kode_simpanan')->unique();

            $table->date('tanggal');

            $table->enum('jenis', [
                'pokok',
                'wajib',
                'sukarela',
            ]);

            $table->decimal('jumlah', 15, 2);

            $table->text('keterangan')->nullable();

            $table->enum('status', [
                'pending',
                'terverifikasi',
                'ditolak',
            ])->default('pending');

            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('verified_at')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpanans');
    }
};
