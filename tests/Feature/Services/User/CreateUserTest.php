<?php

namespace Services\User;

use App\DTO\CreateUserDTO;
use App\Models\Account;
use App\Models\Role;
use App\Services\User\CreateUser;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUser()
    {
        $account = Account::factory()->create();
        $role = Role::factory()->create(['account_id' => $account->id]);

        $createUserDTO = CreateUserDTO::create(
            name: 'John Doe',
            email: 'test@testcreateuser.com',
            password: 'password',
            accountId: $account->id,
            isOwner: false,
            roleId: $role->id
        );

        $user = CreateUser::create($createUserDTO);

        $this->assertNotNull($user);
    }

    public function testCreateUser_failsOnNonUniqueEmail()
    {
        $account = Account::factory()->create();
        $role = Role::factory()->create(['account_id' => $account->id]);

        $createUserDTO1 = CreateUserDTO::create(
            name: 'John Doe',
            email: 'test@testcreateuser.com',
            password: 'password',
            accountId: $account->id,
            isOwner: false,
            roleId: $role->id
        );
        CreateUser::create($createUserDTO1);
        $createUserDTO2 = CreateUserDTO::create(
            name: 'John Ray',
            email: 'test@testcreateuser.com',
            password: 'password',
            accountId: $account->id,
            isOwner: false,
            roleId: $role->id
        );

        $this->expectException(Exception::class);
        CreateUser::create($createUserDTO2);
    }
}
