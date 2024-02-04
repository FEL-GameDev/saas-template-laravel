<?php

namespace App\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasRole
{
    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }

    public function assignRole(string $roleCode): bool {
        $role = Role::where(["role_code" => $roleCode, "account_id" => $this->account_id])->first();

        return $this->role()->associate($role)->save();
    }
}
