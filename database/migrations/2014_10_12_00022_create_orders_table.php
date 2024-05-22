<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('pickup_type', ['Minum di Tempat', 'Bawa Pulang']);
            $table->dateTime('pickup_time');
            $table->decimal('subtotal', 8, 2);
            $table->decimal('packaging_fee', 8, 2)->nullable();
            $table->decimal('total', 8, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
