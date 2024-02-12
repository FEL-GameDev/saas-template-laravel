<?php

namespace App\Repositories\Interfaces\Role;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

interface GetRoleRepositoryInterface
{
    public function getByAccountId(int $accountId): Collection;

    public function getByAccountIdWithCount(int $accountId): Collection;

    public function getByCode(string $roleCode, int $accountId): Role;
}
