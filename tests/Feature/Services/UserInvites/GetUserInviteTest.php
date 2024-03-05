<?php

namespace Services\UserInvites;

use App\Models\User;
use App\Models\UserInvite;
use App\Services\UserInvite\GetUserInvite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetUserInviteTest extends TestCase
{
    use RefreshDatabase;

    public function testGetUserInviteById()
    {
        $user = User::factory()->create();
        $userInvite = UserInvite::factory()->create([
            'user_id' => $user->id,
            'account_id' => $user->account_id
        ]);
        $getUserInviteService = new GetUserInvite();

        $retrievedUserInvite = $getUserInviteService->getById($userInvite->id);

        $this->assertNotNull($retrievedUserInvite);
    }

    public function testGetUserInviteByInviteCode()
    {
        $user = User::factory()->create();
        $userInvite = UserInvite::factory()->create([
            'user_id' => $user->id,
            'account_id' => $user->account_id
        ]);
        $getUserInviteService = new GetUserInvite();

        $retrievedUserInvite = $getUserInviteService->getByInviteCode($userInvite->invite_code);

        $this->assertNotNull($retrievedUserInvite);
    }

    public function testGetUserInviteByAccountId()
    {
        $user = User::factory()->create();
        UserInvite::factory()->create([
            'user_id' => $user->id,
            'account_id' => $user->account_id
        ]);
        $getUserInviteService = new GetUserInvite();

        $retrievedUserInvites = $getUserInviteService->getByAccountId($user->account_id);

        $this->assertNotNull($retrievedUserInvites);
        $this->assertCount(1, $retrievedUserInvites);
    }
}
