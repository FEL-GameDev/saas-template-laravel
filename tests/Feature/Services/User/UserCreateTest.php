<?php

namespace Services\User;

use App\DTO\CreateUserDTO;
use App\Models\Account;
use App\Models\User;
use App\Services\User\CreateUser;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class UserCreateTest extends TestCase
{
    use RefreshDatabase, HasAuthenticatedUser;


    public function testCreateUser()
    {
        Auth::login($this->actingAsUser());
        $createUserDTO = CreateUserDTO::create(
            name: 'John Doe',
            email: 'test@testcreateuser.com',
            password: 'password',
        );

        $user = CreateUser::create($createUserDTO);

        $this->assertNotNull($user);
    }

    public function testCreateUser_failsOnNonUniqueEmail()
    {
        Auth::login($this->actingAsUser());
        $createUserDTO1 = CreateUserDTO::create(
            name: 'John Doe',
            email: 'test@testcreateuser.com',
            password: 'password',
        );
        CreateUser::create($createUserDTO1);
        $createUserDTO2 = CreateUserDTO::create(
            name: 'John Ray',
            email: 'test@testcreateuser.com',
            password: 'password',
        );

        $this->expectException(Exception::class);
        CreateUser::create($createUserDTO2);
    }
}
