<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poster_id')->unsigned()->comment("ID pembuat artikel.");
            $table->string('title')->comment("Judul artikel.");
            $table->longtext('content')->comment("Isi artikel.");

            $table->string('status')->comment("Status artikel (Diterima, Ditolak, atau Belum Diterima).");
            $table->datetime('published_date')->nullable()->comment("Tanggal publikasi.");

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
        Schema::dropIfExists('articles');
    }
}
