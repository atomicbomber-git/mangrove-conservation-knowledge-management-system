<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("spesies");
            $table->string("famili");
            $table->string("deskripsi");
            $table->string("daun")->nullable();
            $table->string("bunga")->nullable();
            $table->string("buah")->nullable();
            $table->string("ekologi")->nullable();
            $table->string("penyebaran")->nullable();
            $table->string("kelimpahan")->nullable();
            $table->string("manfaat")->nullable();
            $table->string("catatan")->nullable();
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
        Schema::dropIfExists('bibits');
    }
}
