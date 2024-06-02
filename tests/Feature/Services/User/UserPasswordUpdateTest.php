<?php

namespace Services\User;

use App\Services\User\UserPasswordUpdate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class UserPasswordUpdateTest extends TestCase
{
    use RefreshDatabase, HasAuthenticatedUser;

    public function testPasswordUpdates(): void
    {
        $user = $this->actingAsUser([
            'email_verified_at' => null,
        ]);
        Auth::login($user);
        $new_user_password = "testPassword123";

        UserPasswordUpdate::update($user, $new_user_password);

        $this->assertTrue(Hash::check($new_user_password, $user->password));
    }
}
