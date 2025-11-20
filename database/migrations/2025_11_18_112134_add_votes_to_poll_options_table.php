<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('poll_options', function (Blueprint $table) {
            $table->integer('votes')->default(0); // Tambahkan kolom votes
        });
    }

    public function down(): void
    {
        Schema::table('poll_options', function (Blueprint $table) {
            $table->dropColumn('votes'); // Hapus kolom kalau rollback
        });
    }
};
