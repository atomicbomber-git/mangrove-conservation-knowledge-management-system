<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = "pengalamans";

    public $fillable = [
        "tema",
        "cerita",
        "pengaduan",
        "keluhan",
        "saran",
    ];

    public function poster()
    {
        return $this->belongsTo(User::class, "poster_id");
    }
}
