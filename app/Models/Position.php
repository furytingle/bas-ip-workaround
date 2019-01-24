<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_positions', 'position_id', 'user_id');
    }
}
