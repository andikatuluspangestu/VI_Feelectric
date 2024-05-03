<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDataTable extends Migration
{
    public function up()
    {
        Schema::create('customer_data', function (Blueprint $table) {
            $table->id('id_customerdata');
            $table->unsignedBigInteger('id_customer');
            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade');
            $table->text('riwayat_pembelian');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_data');
    }
}
