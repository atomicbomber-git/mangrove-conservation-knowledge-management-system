<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');

            $table->string("first_name")->comment("Nama depan penulis hasil penelitian.");
            $table->string("last_name")->comment("Nama belakang penulis hasil penelitian.");
            $table->integer("research_id")->unsigned()->comment("ID hasil penelitian.");
            
            $table->foreign("research_id")
                ->references("id")
                ->on("researches");

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
        Schema::dropIfExists('authors');
    }
}
