<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "description", "role_code", "account_id"
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
}
