<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengalamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalamans', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('poster_id');

            $table->string("tema");
            $table->longText("cerita");
            $table->longText("pengaduan");
            $table->longText("keluhan");
            $table->longText("saran");

            $table->foreign('poster_id')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('pengalamans');
    }
}
