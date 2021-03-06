<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded =[];

    use Notifiable;

    protected $appends = ['full_name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function articles()
    {
        return $this->hasMany(article::class);
    }

    public function getFullNameAttribute()
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->family);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
