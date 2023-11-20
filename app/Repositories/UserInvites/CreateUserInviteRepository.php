<?php

namespace App\Repositories\UserInvites;

use App\DTO\CreateUserInviteDTO;
use App\Models\UserInvite;
use App\Repositories\Interfaces\UserInvites\CreateUserInviteInterface;

class CreateUserInviteRepository implements CreateUserInviteInterface {

    public function create(CreateUserInviteDTO $createUserInviteDTO, string $inviteCode): UserInvite
    {
        return UserInvite::create(
            [
                'name' => $createUserInviteDTO->name,
                'email' => $createUserInviteDTO->email,
                'account_id' => $createUserInviteDTO->accountId,
                'user_id' => $createUserInviteDTO->userId,
                'invite_code' => $inviteCode
            ]
        );
    }
}
