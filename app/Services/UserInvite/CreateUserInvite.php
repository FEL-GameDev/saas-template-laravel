<?php

namespace App\Services\UserInvite;

use App\DTO\CreateUserInviteDTO;
use App\Models\UserInvite;
use App\Repositories\UserInvites\CreateUserInviteRepository;
use Ramsey\Uuid\Uuid;

class CreateUserInvite
{
    public static function create(CreateUserInviteDTO $createUserInviteDTO): UserInvite
    {
        $createUserInviteRepository = new CreateUserInviteRepository();

        $uuid4 = Uuid::uuid4();
        $inviteCode = strtr(base64_encode($uuid4->getBytes()), '+/', '-_');
        $inviteCode = rtrim($inviteCode, '=');

        return $createUserInviteRepository->create($createUserInviteDTO, inviteCode: $inviteCode, roleId: $createUserInviteDTO->roleId);
    }
}
