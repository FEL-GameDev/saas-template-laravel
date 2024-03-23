<?php

namespace Tests\Feature\UserInvited;

use App\Models\User;
use App\Models\UserInvite;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterInvitedUserTest extends TestCase
{
    use RefreshDatabase;

    public function testCanViewInvitedUserRegistrationForm(): void
    {
        $user = User::factory()->create();
        $userInvite = UserInvite::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get('/register/invited/'.$userInvite->invite_code);
        $response->assertStatus(200);
    }

    public function testInvitedUserCanRegister(): void
    {
        $user = User::factory()->create(['role_id' => 1]);
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
