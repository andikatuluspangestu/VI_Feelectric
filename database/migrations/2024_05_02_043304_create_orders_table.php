<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_order');
            $table->unsignedBigInteger('id_customer');
            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade');
            $table->date('tanggal_order');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('subtotal', 10, 2);
            $table->enum('status_order', ['Menunggu', 'Pemrosesan', 'Dikirim', 'Diterima'])->default('Menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
