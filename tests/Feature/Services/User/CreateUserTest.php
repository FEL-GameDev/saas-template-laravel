<?php

namespace Services\User;

use App\DTO\CreateUserDTO;
use App\Models\Account;
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
        $createUserDTO = CreateUserDTO::create(
            name: 'John Doe',
            email: 'test@testcreateuser.com',
            password: 'password',
            accountId: $account->id
        );

        $user = CreateUser::create($createUserDTO);

        $this->assertNotNull($user);
    }

    public function testCreateUser_failsOnNonUniqueEmail()
    {
        $account = Account::factory()->create();
        $createUserDTO1 = CreateUserDTO::create(
            name: 'John Doe',
            email: 'test@testcreateuser.com',
            password: 'password',
            accountId: $account->id
        );
        CreateUser::create($createUserDTO1);
        $createUserDTO2 = CreateUserDTO::create(
            name: 'John Ray',
            email: 'test@testcreateuser.com',
            password: 'password',
            accountId: $account->id
        );

        $this->expectException(Exception::class);
        CreateUser::create($createUserDTO2);
    }
}
