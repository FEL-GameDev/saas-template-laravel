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
     * @param $registerUserInviteDTO
     * @return User
     */
    public static function register(RegisterUserInviteDTO $registerUserInviteDTO): User
    {
        $userInvite = GetUserInvite::get($registerUserInviteDTO->inviteCode);

        $user = CreateUserDTO::create(
            name: $registerUserInviteDTO->name,
            email: $registerUserInviteDTO->email,
            password: $registerUserInviteDTO->password,
            accountId: $userInvite->account_id,
            is_owner: false
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
