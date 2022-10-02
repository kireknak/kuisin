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
        Schema::create('jawaban_peserta_sesi', function (Blueprint $table) {
            $table->id();
            $table->string('jawaban',255);
            $table->integer('nilai');
            $table->foreignId('peserta_sesi_id')->constrained('peserta_sesi');
            $table->foreignId('soal_id')->constrained('soal');
            $table->foreignId('jawaban_id')->constrained('jawaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_peserta_sesi');
    }
};
