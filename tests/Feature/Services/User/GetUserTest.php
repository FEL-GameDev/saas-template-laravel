<?php

namespace Services\User;

use App\Models\Account;
use App\Models\User;
use App\Services\User\GetUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_gets_user_by_id(): void
    {
        $user = User::factory()->create();
        $getUserService = new GetUser();

        $fetched_user = $getUserService->get($user->id);

        $this->assertTrue($user->id === $fetched_user->id);
    }

    public function test_gets_all_users(): void
    {
        $account = Account::factory()->create();
        User::factory()->count(5)->create(['account_id' => $account->id]);
        $getUserService = new GetUser();

        $fetched_users = $getUserService->getAll($account->id);

        $this->assertTrue($fetched_users->count() === 5);
    }

    public function test_gets_user_by_email(): void
    {
        $user = User::factory()->create();
        $getUserService = new GetUser();

        $fetched_user = $getUserService->getByEmail($user->email);

        $this->assertTrue($user->id === $fetched_user->id);
    }
}
