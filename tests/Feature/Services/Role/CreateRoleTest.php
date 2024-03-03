<?php

namespace Services\Role;

use App\DTO\Role\CreateRoleDTO;
use App\Models\Account;
use App\Services\Role\CreateRole;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateRoleTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateRole(): void
    {
        $account = Account::factory()->create();
        $roleDTO = CreateRoleDTO::create($account->id, fake()->word(), fake()->name(), fake()->text());

        $role = CreateRole::create($roleDTO);

        $this->assertNotNull($role);
    }

    public function testCreateRole_failsOnDuplicateRoleCode(): void
    {
        $account = Account::factory()->create();
        $roleDTO = CreateRoleDTO::create(
            accountId: $account->id,
            roleCode: 'super_admin',
            name: fake()->text(),
            description: fake()->name()
        );
        CreateRole::create($roleDTO);
        $roleDTO2 = CreateRoleDTO::create(
            accountId: $account->id,
            roleCode: 'super_admin',
            name: fake()->text(),
            description: fake()->name()
        );

        $this->expectException(Exception::class);
        CreateRole::create($roleDTO2);
    }
}
