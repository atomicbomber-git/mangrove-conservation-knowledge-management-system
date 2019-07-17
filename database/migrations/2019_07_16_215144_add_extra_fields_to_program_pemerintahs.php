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
            $table->string("nama_instansi")->nullable()->comment("Instansi pemberi program pemerintah.");
            $table->string("nama_instansi_penerima")->nullable()->comment("Instansi penerima program pemerintah.");
            $table->string("penanggung_jawab_penerima")->nullable()->comment("Penanggung jawab penerimaan program pemerintah.");
            $table->longText("bentuk")->nullable()->comment("Bentuk program yang diberikan.");
            $table->longText("hasil")->nullable()->comment("Hasil program yang diberikan.");
            $table->decimal("persentase_hasil")->nullable()->comment("Persentasi hasil program yang diberikan");
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
            $table->dropColumn("penanggung_jawab_penerima");
            $table->dropColumn("bentuk");
            $table->dropColumn("hasil");
            $table->dropColumn("persentase_hasil");
        });
    }
}
