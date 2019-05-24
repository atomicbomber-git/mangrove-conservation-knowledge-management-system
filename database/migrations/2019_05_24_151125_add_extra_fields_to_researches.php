<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFieldsToResearches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('researches', function (Blueprint $table) {
            
            $table->string("journal_name")->nullable()->comment("Nama jurnal.");
            $table->string("publisher_location")->nullable()->comment("Tempat penerbit.");
            $table->string("volume")->nullable()->comment("Volume.");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->string("journal_name");
            $table->string("publisher_location");
            $table->string("volume");
        });
    }
}
