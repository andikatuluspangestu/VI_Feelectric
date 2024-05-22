<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations to create the users table with specific fields.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('email')->unique(); // Ensure email is unique
            $table->string('name')->nullable(); // Name of the user, nullable
            $table->string('username')->unique()->nullable(); // Username is unique and can be null
            $table->string('password'); // Password for authentication
            $table->string('profile_picture')->nullable(); // Kolom untuk menyimpan path file gambar profil
            $table->string('date_of_birth')->nullable(); // Tambahkan kolom untuk tanggal lahir yang bisa null
            $table->string('gender')->nullable(); // Tambahkan kolom untuk jenis kelamin yang bisa null
            $table->string('phone')->nullable(); // Tambahkan kolom untuk nomor telepon yang bisa null
            $table->rememberToken(); // Adds a nullable remember_token of type VARCHAR(100) for "remember me" functionality
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations by dropping the users table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users'); // Drop the table if the migration is rolled back
    }
    
}
