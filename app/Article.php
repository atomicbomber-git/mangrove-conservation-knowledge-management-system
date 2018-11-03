<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const STATUSES = [
        'unapproved' => 'Belum / Tidak Disetujui',
        'approved' => 'Telah Disetujui'
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

    public function getStatusAttribute($value)
    {
        return $this::STATUSES[$value];
    }
}
