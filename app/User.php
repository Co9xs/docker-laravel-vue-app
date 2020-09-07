<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable
{
    use Notifiable;
    public function reviews(): HasMany
    {
        return $this->HasMany('App\Review');
    }

    /**
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'graduation_year', 'school_name'
    ];

    /**
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
