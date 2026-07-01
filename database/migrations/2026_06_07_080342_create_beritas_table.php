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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');

            $table->foreignId('website_id')
                ->default(1)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('slug')->unique();

            $table->string('gambar')->nullable();

            $table->date('tanggal');

            $table->text('ringkasan')->nullable();

            $table->longText('isi');

            $table->boolean('is_publish')->default(true);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
