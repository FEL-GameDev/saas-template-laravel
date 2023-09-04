<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvite extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'user_id',
        'invite_code',
        'email',
        'name'
    ];
}