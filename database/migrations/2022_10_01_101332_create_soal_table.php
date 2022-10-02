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
        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuis_id')->constrained('kuis');
            $table->foreignId('tipe_soal_id')->constrained('tipe_soal');
            $table->foreignId('gambar_id')->constrained('gambar');
            $table->string('pertanyaan',255);
            $table->integer('batas_waktu');
            $table->integer('nilai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal');
    }
};
