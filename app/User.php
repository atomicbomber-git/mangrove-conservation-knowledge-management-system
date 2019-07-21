<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const TYPE_ADMIN = "admin";
    const TYPE_RESEARCHER = "researcher";
    const TYPE_REGULAR = "regular";
    const TYPE_GOVERNMENT = "government";


    const TYPES = [
        self::TYPE_ADMIN => 'Administator',
        self::TYPE_RESEARCHER => 'Peneliti',
        self::TYPE_REGULAR => 'Umum',
        self::TYPE_GOVERNMENT => 'Pemerintah',
    ];

    public function getTypeAttribute($value)
    {
        return $this::TYPES[$value];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'password', 'username', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'poster_id');
    }

    public function researches()
    {
        return $this->hasMany(Research::class, 'poster_id');
    }

    public function pengalamans()
    {
        return $this->hasMany(Pengalaman::class, 'poster_id');
    }
}
