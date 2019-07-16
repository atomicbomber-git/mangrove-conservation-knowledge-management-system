<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFieldsToProgramPemerintahs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_pemerintahs', function (Blueprint $table) {
            $table->string("nama_instansi")->comment("Instansi pemberi program pemerintah.");
            $table->string("nama_instansi_penerima")->comment("Instansi penerima program pemerintah.");
            $table->string("penanggung_jawab_pemerima")->comment("Penanggung jawab penerimaan program pemerintah.");
            $table->longText("bentuk")->comment("Bentuk program yang diberikan.");
            $table->longText("hasil")->comment("Hasil program yang diberikan.");
            $table->decimal("persentase_hasil")->comment("Persentasi hasil program yang diberikan");
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
            $table->dropColumn("nama_instansi");
            $table->dropColumn("nama_instansi_penerima");
            $table->dropColumn("penanggung_jawab_pemerima");
            $table->dropColumn("bentuk");
            $table->dropColumn("hasil");
            $table->dropColumn("persentase_hasil");
        });
    }
}
