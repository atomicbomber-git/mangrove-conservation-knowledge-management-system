<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtendBibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bibits', function (Blueprint $table) {
            $table->longText("deskripsi")->nullable()->change();
            $table->longText("daun")->nullable()->change();
            $table->longText("bunga")->nullable()->change();
            $table->longText("buah")->nullable()->change();
            $table->longText("ekologi")->nullable()->change();
            $table->longText("penyebaran")->nullable()->change();
            $table->longText("kelimpahan")->nullable()->change();
            $table->longText("manfaat")->nullable()->change();
            $table->longText("catatan")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bibits', function (Blueprint $table) {
            $table->string("deskripsi")->nullable()->change();
            $table->string("daun")->nullable()->change();
            $table->string("bunga")->nullable()->change();
            $table->string("buah")->nullable()->change();
            $table->string("ekologi")->nullable()->change();
            $table->string("penyebaran")->nullable()->change();
            $table->string("kelimpahan")->nullable()->change();
            $table->string("manfaat")->nullable()->change();
            $table->string("catatan")->nullable()->change();
        });
    }
}
