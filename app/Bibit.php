<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Bibit extends Model implements HasMedia
{
    use HasMediaTrait;

    public $fillable = [
        "spesies",
        "famili",
        "deskripsi",
        "daun",
        "bunga",
        "buah",
        "ekologi",
        "penyebaran",
        "kelimpahan",
        "manfaat",
        "catatan",
    ];
}
