<?php

namespace App;

use Html2Text\Html2Text;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Definisi extends Model implements HasMedia
{
    use HasMediaTrait;

    public $fillable = [
        "title",
        "content",
    ];

    public function getContentTextAttribute()
    {
        if (empty($this->content)) {
            return $this->content;
        }

        return (new Html2Text($this->content))->getText();
    }

    public function getShortContentTextAttribute()
    {
        return Str::limit($this->content_text);
    }
}
