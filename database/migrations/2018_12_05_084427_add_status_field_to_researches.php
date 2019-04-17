<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Research;

class AddStatusFieldToResearches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->string('status')
                ->default(Research::STATUS_UNAPPROVED)
                ->comment("Status hasil penelitian (Diterima, Ditolak, Belum Diterima).");
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
            $table->dropColumn('status');
        });
    }
}
