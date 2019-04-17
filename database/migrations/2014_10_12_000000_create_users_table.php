<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment("Nama asli.");
            $table->string('username')->unique()->comment("Nama pengguna.");
            // $table->string('email')->unique()->nullable();
            $table->string('type')->comment("Tipe pengguna; Untuk menentukan hak akses.");
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment("Kata sandi pengguna.");
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
