<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const STATUS_APPROVED = 'approved';
    const STATUS_UNAPPROVED = 'unapproved';
    const STATUS_REJECTED = 'rejected';

    const STATUSES = [
        self::STATUS_APPROVED => 'Disetujui',
        self::STATUS_UNAPPROVED => 'Belum Disetujui',
        self::STATUS_REJECTED => 'Ditolak'
    ];

    public $fillable = [
        'poster_id', 'title', 'content', 'status', 'category_id', 'published_date'
    ];

    public $dates = [
        'published_date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function poster()
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function getStatusAttribute($value)
    {
        return $this::STATUSES[$value];
    }
}
