<?php

namespace App\Services\User;

use App\DTO\CreateUserDTO;
use App\DTO\RegisterUserInviteDTO;
use App\Models\User;
use App\Services\UserInvite\GetUserInvite;
use Illuminate\Support\Facades\DB;
use Throwable;

class RegisterInvitedUser
{
    /**
     * @param RegisterUserInviteDTO $registerUserInviteDTO
     * @return User
     * @throws Throwable
     */
    public static function register(RegisterUserInviteDTO $registerUserInviteDTO): User
    {
        $userInvite = GetUserInvite::getByInviteCode($registerUserInviteDTO->inviteCode);

        $user = CreateUserDTO::create(
            name: $registerUserInviteDTO->name,
            email: $registerUserInviteDTO->email,
            password: $registerUserInviteDTO->password,
            accountId: $userInvite->account_id,
            isOwner: false,
            roleId: $userInvite->role_id
        );

        DB::beginTransaction();

        try {
            $createdUser = CreateUser::create($user);
            $userInvite->delete();

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollback();
            throw $exception;
        }

        return $createdUser;
    }
}
