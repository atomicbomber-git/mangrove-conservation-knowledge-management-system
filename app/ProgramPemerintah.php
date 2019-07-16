<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPemerintah extends Model
{
    public $fillable = [
        "nama", "tanggal_mulai", "tanggal_selesai", "dana", "penanggung_jawab"
    ];

    public function bibit_program_pemerintah()
    {
        return $this->hasMany(BibitProgramPemerintah::class);
    }

    public function bibits() {
        return $this->belongsToMany(Bibit::class, "bibit_program_pemerintahs")
            ->using(BibitProgramPemerintah::class)
            ->as("data")
            ->withPivot("jumlah");
    }
}
