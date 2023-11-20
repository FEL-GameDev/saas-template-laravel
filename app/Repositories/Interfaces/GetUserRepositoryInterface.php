<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface GetUserRepositoryInterface
{
    public function getById(int $userId): User;
}