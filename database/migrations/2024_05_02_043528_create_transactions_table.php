<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaction');
            $table->unsignedBigInteger('id_customer');
            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id_order')->on('orders')->onDelete('cascade');
            $table->string('metode_pembayaran');
            $table->date('tanggal_transaction');
            $table->decimal('total_pembayaran', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
