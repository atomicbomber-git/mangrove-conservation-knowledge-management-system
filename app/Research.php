<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Research extends Model implements HasMedia
{
    use HasMediaTrait;

    const STATUS_APPROVED = 'approved';
    const STATUS_UNAPPROVED = 'unapproved';

    const STATUSES = [
        self::STATUS_UNAPPROVED => 'Belum / Tidak Disetujui',
        self::STATUS_APPROVED => 'Telah Disetujui'
    ];

    public $fillable = [
        'title', 'category_id', 'poster_id', 'status', 'description', 'year'
    ];

    public function poster()
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatusAttribute($value)
    {
        return $this::STATUSES[$value];
    }

    public function scopeApproved($query)
    {
        $query->where('status', 'approved');
    }
}
