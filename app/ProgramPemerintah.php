<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPemerintah extends Model
{
    public $fillable = [
        "nama", "tanggal_mulai", "tanggal_selesai", "dana", "penanggung_jawab"
    ];
}
