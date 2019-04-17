<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->text("year")->comment("Tahun hasil penelitian.");
            $table->text("description")->comment("Deskripsi hasil penelitian.");
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
            $table->dropColumn("year");
            $table->dropColumn("description");
        });
    }
}
