<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaKursusTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pesertakursus', function (Blueprint $table) {
            $table->id('id_peserta'); 
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_kursus');
            $table->date('tanggal_pendaftaran');
            $table->string('status_pembayaran');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade');
            $table->foreign('id_kursus')->references('id_kursus')->on('kursusbarista')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertakursus');
    }
}
