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
        Schema::table('pinjamen', function (Blueprint $table) {
            //
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();

            $table->string('jaminan')->nullable();

            $table->string('file_ktp')->nullable();
            $table->string('file_kk')->nullable();
            $table->string('file_bukti_penghasilan')->nullable();
            $table->string('file_agunan')->nullable();
            $table->string('file_dokumen_pendukung')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pinjamen', function (Blueprint $table) {
            //
            $table->dropColumn([
                'no_hp',
                'email',
                'jaminan',
                'file_ktp',
                'file_kk',
                'file_bukti_penghasilan',
                'file_agunan',
                'file_dokumen_pendukung',
            ]);
        });
    }
};
