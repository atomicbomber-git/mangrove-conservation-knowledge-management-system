<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BibitProgramPemerintah extends Pivot
{
    public $table = "bibit_program_pemerintahs";
    public $timestamps = true;
    public $incrementing = true;

    public $fillable = [
        "bibit_id", "program_pemerintah_id", "jumlah",
    ];
}
