<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBibitProgramPemerintahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bibit_program_pemerintahs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('bibit_program_pemerintahs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bibit_id');
            $table->unsignedInteger('program_pemerintah_id');
            $table->unsignedInteger('jumlah');
            $table->unique(['bibit_id', 'program_pemerintah_id']);

            $table->foreign('program_pemerintah_id')
                ->references('id')
                ->on('program_pemerintahs');

            $table->foreign('bibit_id')
                ->references('id')
                ->on('bibits');
            $table->timestamps();
        });
    }
}
