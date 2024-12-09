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
        Schema::table('blogs', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['user_id']);

            // Ubah kolom user_id menjadi nullable
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Kembalikan kolom user_id menjadi non-nullable
            $table->unsignedBigInteger('user_id')->nullable(false)->change();

            // Tambahkan foreign key kembali
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

};
