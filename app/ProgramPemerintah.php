<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPemerintah extends Model
{
    public $perPage = 10;

    public $fillable = [
        "nama",
        "tanggal_mulai",
        "tanggal_selesai",
        "dana",
        "penanggung_jawab",
        "nama_instansi",
        "nama_instansi_penerima",
        "penanggung_jawab_penerima",
        "bentuk",
        "hasil",
        "persentase_hasil",
        "lokasi",
    ];
}
