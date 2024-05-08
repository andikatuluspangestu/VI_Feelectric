<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('id_customer');
            $table->string('nama_customer');
            $table->string('email'); 
            $table->string('password');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('alamat');
            $table->string('no_telp');
            $table->boolean('verifikasi_google')->default(false);
            $table->boolean('verifikasi_sosmed')->default(false);
            $table->integer('poin_loyalti')->default(0);
            $table->enum('status_loyalti', ['bronze', 'silver', 'gold'])->default('bronze');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
