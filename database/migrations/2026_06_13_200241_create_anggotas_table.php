<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('no_anggota')->unique();

            $table->string('nik', 16)
                ->nullable()
                ->unique();

            $table->string('tempat_lahir')->nullable();

            $table->date('tanggal_lahir')->nullable();

            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan',
            ])->nullable();

            $table->text('alamat')->nullable();

            $table->string('no_hp', 20)->nullable();

            $table->enum('jenis_petani', [
                'Plasma',
                'Swadaya',
            ])->nullable();

            $table->decimal('luas_lahan', 8, 2)->nullable();

            $table->string('blok_kebun')->nullable();

            $table->date('tanggal_bergabung')->nullable();

            $table->string('foto')->nullable();

            $table->enum('status', [
                'Aktif',
                'Tidak Aktif',
            ])
                ->default('Aktif')
                ->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
