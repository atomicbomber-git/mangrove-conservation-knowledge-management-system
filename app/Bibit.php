<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    public function program_pemerintah()
    {
        return $this->belongsToMany(ProgramPemerintah::class, "bibit_program_pemerintahs")
            ->using(BibitProgramPemerintah::class);
    }
}
