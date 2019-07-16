<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPemerintah extends Model
{
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
