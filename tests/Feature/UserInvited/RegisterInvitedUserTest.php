<?php

namespace Tests\Feature\UserInvited;

use App\Models\User;
use App\Models\UserInvite;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class RegisterInvitedUserTest extends TestCase
{
    use RefreshDatabase, HasAuthenticatedUser;

    public function testCanViewInvitedUserRegistrationForm(): void
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        $userInvite = UserInvite::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get('/register/invited/'.$userInvite->invite_code);
        $response->assertStatus(200);
    }

    public function testInvitedUserCanRegister(): void
    {
        $user = $this->actingAsUser(['role_id' => 1]);
        Auth::login($user);
        $userInvite = UserInvite::factory()->create([
            'user_id' => $user->id,
            'role_id' => $user->role_id,
        ]);

        $response = $this->post('/register/invited/store', [
            'name' => 'Test User',
            'email' => $userInvite->email,
            'password' => 'password',
            'inviteCode' => $userInvite->invite_code,
            'roleId' => $userInvite->role_id,
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
