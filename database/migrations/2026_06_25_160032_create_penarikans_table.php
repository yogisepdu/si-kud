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
        Schema::create('penarikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('kode_penarikan')->unique();

            $table->date('tanggal_penarikan');

            $table->decimal('jumlah_penarikan', 15, 2);

            $table->text('keterangan')->nullable();

            $table->string('slip')->nullable();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penarikans');
    }
};
