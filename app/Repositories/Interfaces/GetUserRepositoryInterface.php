<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface GetUserRepositoryInterface
{
    public function getById(int $userId): User;

    public function getAll(int $accountId): Collection;
}
