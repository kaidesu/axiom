<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user can have many projects.
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'owner_id')
            ->latest('updated_at');
    }

    /**
     * A user can have many notebooks.
     */
    public function notebooks()
    {
        return $this->hasMany(Notebook::class, 'owner_id')
            ->latest('updated_at');
    }
}
