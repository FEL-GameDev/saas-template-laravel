<?php

namespace Services\Role;

use App\DTO\Role\CreateRoleDTO;
use App\Models\Account;
use App\Services\Role\CreateRole;
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
}
