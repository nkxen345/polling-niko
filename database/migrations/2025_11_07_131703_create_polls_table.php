<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('polls', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('question');
        $table->boolean('status')->default(1);
        $table->unsignedBigInteger('user_id');
        $table->timestamps();
    });
}


};
