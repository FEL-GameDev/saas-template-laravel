<?php

namespace Services\User;

use App\DTO\CreateUserInviteDTO;
use App\DTO\RegisterUserInviteDTO;
use App\Models\User;
use App\Services\User\RegisterInvitedUser;
use App\Services\UserInvite\CreateUserInvite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use TypeError;

class RegisterInvitedUserTest extends TestCase
{
    use RefreshDatabase;

    public function testCanRegisterInvitedUser(): void
    {
        $user = User::factory()->create();
        $createUserInviteDTO = CreateUserInviteDTO::create(
            name: fake()->name(),
            email: fake()->email(),
            userId: $user->id,
            accountId: $user->account_id,
            roleId: $user->role_id
        );
        $userInvite = CreateUserInvite::create($createUserInviteDTO);
        $registerUserInviteDTO = RegisterUserInviteDTO::create(
            name: $createUserInviteDTO->name,
            email: $createUserInviteDTO->email,
            password: 'password',
            inviteCode: $userInvite->invite_code,
        );

        $registeredUser = RegisterInvitedUser::register($registerUserInviteDTO);

        $this->assertNotNull($registeredUser);
    }

    public function testFailsToRegisterInvitedUserWithInvalidInviteCode(): void
    {
        $user = User::factory()->create();
        $createUserInviteDTO = CreateUserInviteDTO::create(
            name: fake()->name(),
            email: fake()->email(),
            userId: $user->id,
            accountId: $user->account_id,
            roleId: $user->role_id
        );
        $userInvite = CreateUserInvite::create($createUserInviteDTO);
        $registerUserInviteDTO = RegisterUserInviteDTO::create(
            name: $userInvite->name,
            email: $userInvite->email,
            password: 'password',
            inviteCode: 'invalid_invite_code',
        );

        $this->expectException(TypeError::class);

        RegisterInvitedUser::register($registerUserInviteDTO);
    }

}
