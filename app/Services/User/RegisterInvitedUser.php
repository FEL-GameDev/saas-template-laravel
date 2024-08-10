<?php

namespace App\Services\User;

use App\DTO\RegisterUserInviteDTO;
use App\DTO\User\NoAccountUserDTO;
use App\Models\User;
use App\Services\UserInvite\GetUserInvite;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class RegisterInvitedUser
{
    /**
     * @param RegisterUserInviteDTO $registerUserInviteDTO
     * @return User|null
     */
    public static function register(RegisterUserInviteDTO $registerUserInviteDTO): User|null
    {
        $userInvite = GetUserInvite::getByInviteCode($registerUserInviteDTO->inviteCode);

        $user = NoAccountUserDTO::create(
            name: $registerUserInviteDTO->name,
            email: $registerUserInviteDTO->email,
            password: $registerUserInviteDTO->password,
            accountId: $userInvite->account_id,
        );

        DB::beginTransaction();

        try {
            $createdUser = CreateUser::createInvitedUser($user);
            $userInvite->delete();

            DB::commit();
        } catch (Throwable) {
            DB::rollback();

            throw new Exception("Failed to register user");
        }

        return $createdUser;
    }
}
