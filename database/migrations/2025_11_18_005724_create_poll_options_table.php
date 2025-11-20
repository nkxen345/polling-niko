<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('poll_options', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('poll_id');
        $table->string('option_text');
        $table->integer('votes')->default(0);
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('poll_options');
    }
};