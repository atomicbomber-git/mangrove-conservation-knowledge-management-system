<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramPemerintahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_pemerintahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->unique()->index();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->decimal('dana', 19, 4);
            $table->string('penanggung_jawab');
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
        Schema::dropIfExists('program_pemerintahs');
    }
}
