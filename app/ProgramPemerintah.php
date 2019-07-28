<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ProgramPemerintah extends Model implements HasMedia
{
    use HasMediaTrait;

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

    public function hasImage()
    {
        return $this->hasMedia(config("media.collections.images"));
    }
}
