<?php

namespace Services\User;

use App\Models\Account;
use App\Models\User;
use App\Services\User\GetUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class UserGetTest extends TestCase
{
    use RefreshDatabase, HasAuthenticatedUser;

    public function testGetUserById(): void
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        $getUserService = new GetUser();

        $fetched_user = $getUserService->get($user->id);

        $this->assertTrue($user->id === $fetched_user->id);
    }

    public function testGetAllUsers(): void
    {
        $account = $this->actingAsAccount();
        $user = $this->actingAsUser();
        Auth::login($user);
        User::factory()->count(5)->create(['account_id' => $account->id]);
        $getUserService = new GetUser();

        $fetched_users = $getUserService->getAll();

        $this->assertTrue($fetched_users->count() === 6);
    }

    public function testGetUserByEmail(): void
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        $getUserService = new GetUser();

        $fetched_user = $getUserService->getByEmail($user->email);

        $this->assertTrue($user->id === $fetched_user->id);
    }
}
