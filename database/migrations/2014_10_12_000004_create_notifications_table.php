<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Menggunakan UUID untuk ID.
            $table->string('type');
            $table->morphs('notifiable'); // Polymorphic relation, bisa digunakan untuk mengaitkan dengan model manapun.
            $table->text('data'); // Menyimpan data notifikasi sebagai JSON.
            $table->timestamp('read_at')->nullable(); // Menyimpan timestamp ketika notifikasi dibaca.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
