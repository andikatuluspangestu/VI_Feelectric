<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegenciesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('regencies', function (Blueprint $table) {
            $table->id(); // Asumsi bahwa ID adalah primary key yang auto-increment
            $table->string('kode');
            $table->string('name'); // Kolom nama kecamatan
            $table->timestamps(); // Opsional, menyediakan kolom created_at dan updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regencies');
    }
};
