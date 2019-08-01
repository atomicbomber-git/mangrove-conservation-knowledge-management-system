<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definisi extends Model
{
    public $fillable = [
        "title",
        "content",
    ];
}
