<?php

namespace Tests\Traits;

use App\Models\Account;
use App\Models\User;

trait HasAuthenticatedUser
{
    protected Account|null $account = null;
    protected User|null $user = null;

    protected function actingAsUser($userInputs = []): User
    {
        if (is_null($this->user) ) {
            $account = $this->actingAsAccount();
            $defaultUserFields = [
                'account_id' => $account->id,
            ];

            $this->user = User::factory()->create(array_merge($defaultUserFields, $userInputs));
        }

        return $this->user;
    }

    protected function actingAsAccount($accountInputs = []): Account
    {
        if (is_null($this->account)) {
            $this->account = Account::factory()->create($accountInputs);
        }

        return $this->account;
    }
}
