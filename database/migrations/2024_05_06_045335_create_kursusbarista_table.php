<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKursusBaristaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kursusbarista', function (Blueprint $table) {
            $table->id('id_kursus'); 
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id_admin')->on('admins')->onDelete('cascade');
            $table->unsignedBigInteger('id_instruktur');
            $table->foreign('id_instruktur')->references('id_instruktur')->on('instrukturs')->onDelete('cascade');
            $table->string('nama_kursus');
            $table->text('deskripsi');
            $table->decimal('biaya', 10, 2);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('durasi');
            $table->integer('kapasitas_max');
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
        Schema::dropIfExists('kursusbarista');
    }
}
