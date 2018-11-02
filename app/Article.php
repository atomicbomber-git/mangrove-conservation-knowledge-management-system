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
        'poster_id', 'title', 'content', 'status'
    ];

    public function getStatusAttribute($value)
    {
        return $this::STATUSES[$value];
    }
}
