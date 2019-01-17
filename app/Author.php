<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $fillable = [
        'first_name', 'last_name', 'research_id'
    ];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
