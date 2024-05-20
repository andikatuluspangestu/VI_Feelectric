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
            // $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            
            $table->integer('quantity');
            $table->integer('final_price');
            $table->string('catatan')->nullable();
            $table->decimal('shipping_cost', 8, 2)->default(0);
            $table->decimal('discount', 8, 2)->default(0);
            $table->string('payment_method')->nullable();
            // $table->string('status')->default('pending'); // pending, paid, shipped, delivered
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
