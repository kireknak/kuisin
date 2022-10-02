<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id();
            $table->string('jawaban');
            $table->integer('nilai');
            $table->foreignId('soal_id')->constrained('soal');
            $table->foreignId('gambar_id')->constrained('gambar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban');
    }
};
