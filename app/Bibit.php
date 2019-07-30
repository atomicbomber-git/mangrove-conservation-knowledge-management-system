<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
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
