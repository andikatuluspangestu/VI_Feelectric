<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sales_statistics', function (Blueprint $table) {
            $table->id('id_sales');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('cascade');
            $table->date('tanggal_sales');
            $table->integer('jumlah_terjual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_statistics');
    }
};
