<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('poster_id')->unsigned()->comment("ID pengguna pembuat hasil penelitian.");
            $table->integer('category_id')->unsigned()->comment("ID kategori hasil penelitian.");

            $table->string('title')->comment("Judul hasil penelitian.");

            $table->foreign('poster_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('researches');
    }
}
