<?php

namespace Services\User;

use App\Models\User;
use App\Services\User\UserProfileUpdate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_updates_name(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
        $userProfileUpdateService = new UserProfileUpdate();
        
        $user = $userProfileUpdateService->update($user, [
                'name' => 'Test User'
            ]
        );

        $this->assertTrue($user->name === 'Test User');
    }

    public function test_updates_email(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
        $userProfileUpdateService = new UserProfileUpdate();
        $new_email = fake()->email();

        $user = $userProfileUpdateService->update($user, [
            'email' => $new_email,
        ]);

        $this->assertTrue($user->email === $new_email);
    }

    public function test_updates_multiple_fields(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
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
