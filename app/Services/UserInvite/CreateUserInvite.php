<?php

namespace App\Services\UserInvite;

use App\DTO\CreateUserInviteDTO;
use App\Models\UserInvite;
use App\Repositories\UserInvites\CreateUserInviteRepository;

class CreateUserInvite
{
    public static function create(CreateUserInviteDTO $createUserInviteDTO): UserInvite
    {
        $createUserInviteRepository = new CreateUserInviteRepository();

        $inviteCode = hash("crc32", $createUserInviteDTO->email . $createUserInviteDTO->accountId);

        return $createUserInviteRepository->create($createUserInviteDTO, inviteCode: $inviteCode);
    }
}
