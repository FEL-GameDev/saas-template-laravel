<?php

namespace Services\User;

use App\Models\User;
use App\Services\User\UserPasswordUpdate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserPasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_updates(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
        $userPasswordUpdateService = new UserPasswordUpdate();
        $new_user_password = "testPassword123";

        $userPasswordUpdateService->update($user, $new_user_password);

        $this->assertTrue(Hash::check($new_user_password, $user->password));
    }
}
