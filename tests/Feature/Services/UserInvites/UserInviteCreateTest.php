<?php

namespace Services\UserInvites;

use App\DTO\CreateUserInviteDTO;
use App\Services\UserInvite\CreateUserInvite;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class UserInviteCreateTest extends TestCase
{
    use RefreshDatabase, HasAuthenticatedUser;

    public function testCreateUserInvite()
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        $createUserInviteDTO = CreateUserInviteDTO::create(
            name: 'John Doe',
            email: fake()->email(),
            userId: $user->id,
        );

        $userInvite = CreateUserInvite::create($createUserInviteDTO);

        $this->assertNotNull($userInvite);
    }

    public function testCreateUserInvite_failsOnNonUniqueEmail()
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        $createUserInviteDTO1 = CreateUserInviteDTO::create(
            name: 'John Doe',
            email: 'test@example.com', userId: $user->id,
        );
        CreateUserInvite::create($createUserInviteDTO1);
        $createUserInviteDTO2 = CreateUserInviteDTO::create(
            name: 'John Ray',
            email: 'test@example.com',
            userId: $user->id,
        );

        $this->expectException(Exception::class);
        CreateUserInvite::create($createUserInviteDTO2);
    }
}
