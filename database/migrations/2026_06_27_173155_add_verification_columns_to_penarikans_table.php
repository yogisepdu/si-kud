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
        Schema::table('penarikans', function (Blueprint $table) {
            //
            $table->string('status')
                ->default('pending')
                ->after('keterangan');

            $table->foreignId('verified_by')
                ->nullable()
                ->after('status')
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('verified_at')
                ->nullable()
                ->after('verified_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penarikans', function (Blueprint $table) {
            //
            $table->dropForeign(['verified_by']);

            $table->dropColumn([
                'status',
                'verified_by',
                'verified_at',
            ]);
        });
    }
};
