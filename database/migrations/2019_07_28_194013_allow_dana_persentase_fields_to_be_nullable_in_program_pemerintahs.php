<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowDanaPersentaseFieldsToBeNullableInProgramPemerintahs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_pemerintahs', function (Blueprint $table) {
            $table->decimal('dana', 19, 4)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_pemerintahs', function (Blueprint $table) {
            $table->decimal('dana', 19, 4)->change();
        });
    }
}
