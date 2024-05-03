<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tracking', function (Blueprint $table) {
            $table->id('id_tracking');
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id_order')->on('orders')->onDelete('cascade');
            $table->enum('status_pengiriman', ['belum dikirim', 'sedang dikirim', 'telah terkirim', 'gagal pengiriman'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracking');
    }
};