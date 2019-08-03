<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Definisi extends Model implements HasMedia
{
    use HasMediaTrait;

    public $fillable = [
        "title",
        "content",
    ];
}
