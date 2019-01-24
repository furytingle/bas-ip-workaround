<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'users_positions', 'user_id', 'position_id')
            ->as('details')
            ->withPivot('salary');
    }
}
