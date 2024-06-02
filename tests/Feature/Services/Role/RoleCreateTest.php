<?php

namespace Services\Role;

use App\DTO\Role\CreateRoleDTO;
use App\Models\Account;
use App\Models\User;
use App\Services\Role\CreateRole;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class RoleCreateTest extends TestCase
{
    use RefreshDatabase, HasAuthenticatedUser;

    public function testCreateRole(): void
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        $roleDTO = CreateRoleDTO::create(
            roleCode: fake()->word(),
            name: fake()->name(),
            description: fake()->text(),
        );

        $role = CreateRole::create($roleDTO);

        $this->assertNotNull($role);
    }

    public function testCreateRole_failsOnDuplicateRoleCode(): void
    {
        $user = $this->actingAsUser();
        Auth::login($user);
        auth()->setUser($user);

        $roleDTO = CreateRoleDTO::create(
            roleCode: 'super_admin',
            name: fake()->text(),
            description: fake()->name()
        );
        CreateRole::create($roleDTO);
        $roleDTO2 = CreateRoleDTO::create(
            roleCode: 'super_admin',
            name: fake()->text(),
            description: fake()->name()
        );

        $this->expectException(Exception::class);
        CreateRole::create($roleDTO2);
    }
}
