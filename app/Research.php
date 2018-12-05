<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Research extends Model implements HasMedia
{
    use HasMediaTrait;

    const STATUSES = [
        'unapproved' => 'Belum / Tidak Disetujui',
        'approved' => 'Telah Disetujui'
    ];

    public $fillable = [
        'title', 'category_id', 'poster_id', 'status'
    ];

    public function poster()
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatusAttribute($value)
    {
        return $this::STATUSES[$value];
    }
}
