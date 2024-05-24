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
            $table->string('email')->unique(); 
            $table->string('name')->nullable();
            $table->string('username')->unique()->nullable(); 
            $table->string('password'); 
            $table->string('profile_picture')->nullable(); 
            $table->date('date_of_birth')->nullable(); 
            $table->enum('gender', ['Pria', 'Wanita', 'Tidak menyebutkan'])->nullable(); 
            $table->string('phone')->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->rememberToken(); 
            $table->timestamps();
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
