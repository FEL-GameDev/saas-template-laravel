<?php

namespace App\Repositories\Interfaces\UserInvites;

use App\DTO\CreateUserInviteDTO;
use App\Models\UserInvite;

interface CreateUserInviteInterface {

    public function create(CreateUserInviteDTO $createUserInviteDTO, string $inviteCode): UserInvite;
}
