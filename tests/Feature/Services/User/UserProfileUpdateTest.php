<?php

namespace Services\User;

use App\Services\User\UserProfileUpdate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class UserProfileUpdateTest extends TestCase
{
    use RefreshDatabase, HasAuthenticatedUser;

    public function testUpdatesName(): void
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        $userProfileUpdateService = new UserProfileUpdate();

        $user = $userProfileUpdateService->update($user, [
                'name' => 'Test User'
            ]
        );

        $this->assertTrue($user->name === 'Test User');
    }

    public function testUpdatesEmail(): void
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        $userProfileUpdateService = new UserProfileUpdate();
        $new_email = fake()->email();

        $user = $userProfileUpdateService->update($user, [
            'email' => $new_email,
        ]);

        $this->assertTrue($user->email === $new_email);
    }

    public function testUpdatesMultipleFields(): void
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        $userProfileUpdateService = new UserProfileUpdate();
        $new_email = fake()->email();

        $user = $userProfileUpdateService->update($user, [
            'name' => 'Test User',
            'email' => $new_email,
        ]);

        $this->assertTrue($user->name === 'Test User');
        $this->assertTrue($user->email === $new_email);
    }
}
