<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    function userInvites(): HasMany
    {
        return $this->hasMany(UserInvite::class);
    }
}
