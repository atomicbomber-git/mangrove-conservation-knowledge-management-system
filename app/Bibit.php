<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasRelatedEntitiesCount;

class Bibit extends Model
{
    use HasRelatedEntitiesCount;

    public $fillable = [
        "nama"
    ];

    const RELATED_ENTITIES = [
        "program_pemerintah"
    ];

    public function program_pemerintahs()
    {
        return $this->belongsToMany(ProgramPemerintah::class, "bibit_program_pemerintahs")
            ->using(BibitProgramPemerintah::class);
    }
}
