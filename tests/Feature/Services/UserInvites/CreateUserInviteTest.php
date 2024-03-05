<?php

namespace Services\UserInvites;

use App\DTO\CreateUserInviteDTO;
use App\Models\User;
use App\Services\UserInvite\CreateUserInvite;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUserInviteTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUserInvite()
    {
        $user = User::factory()->create();
        $createUserInviteDTO = CreateUserInviteDTO::create(
            name: 'John Doe',
            email: fake()->email(),
            userId: $user->id,
            accountId: $user->account_id
        );

        $userInvite = CreateUserInvite::create($createUserInviteDTO);

        $this->assertNotNull($userInvite);
    }

    public function testCreateUserInvite_failsOnNonUniqueEmail()
    {
        $user = User::factory()->create();
        $createUserInviteDTO1 = CreateUserInviteDTO::create(
            name: 'John Doe',
            email: 'test@example.com', userId: $user->id,
            accountId: $user->account_id
        );
        CreateUserInvite::create($createUserInviteDTO1);
        $createUserInviteDTO2 = CreateUserInviteDTO::create(
            name: 'John Ray',
            email: 'test@example.com',
            userId: $user->id,
            accountId: $user->account_id
        );

        $this->expectException(Exception::class);
        CreateUserInvite::create($createUserInviteDTO2);
    }

}
