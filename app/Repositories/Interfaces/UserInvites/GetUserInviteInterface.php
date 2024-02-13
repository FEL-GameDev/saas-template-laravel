<?php

namespace App\Repositories\Interfaces\UserInvites;

use App\DTO\CreateUserInviteDTO;
use App\Models\UserInvite;
use Illuminate\Database\Eloquent\Collection;

interface GetUserInviteInterface {

    public function getById(int $userInviteId): UserInvite;

    public function getByInviteCode(string $inviteCode): UserInvite;

    public function getAllByAccountId(int $accountId): Collection;
}
