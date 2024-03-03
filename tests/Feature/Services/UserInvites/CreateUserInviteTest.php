<?php

namespace Services\UserInvites;

use App\DTO\CreateUserInviteDTO;
use App\Models\User;
use App\Services\UserInvite\CreateUserInvite;
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
}
