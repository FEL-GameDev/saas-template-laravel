<?php

namespace App\Traits;

use App\Models\Role;
use App\Services\Role\GetRole;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasRole
{

    protected Role $role;

    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }

    public function assignRole(string $roleCode): bool {
        $role = GetRole::getByCode($roleCode, $this->account_id);

        return $this->role()->associate($role)->save();
    }
}
