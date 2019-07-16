<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bibits', function (Blueprint $table) {
            Schema::dropIfExists('bibits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('bibits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->unique()->index();
            $table->timestamps();
        });
    }
}
