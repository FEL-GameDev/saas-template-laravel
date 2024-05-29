<?php

namespace App\DTO\User;

class AccountOwnerDTO
{
    private function __construct(
        public string $name,
        public string $email,
        public string $password,
        public int    $accountId,
    )
    {
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param int $accountId
     * @return AccountOwnerDTO
     */
    public static function create(string $name, string $email, string $password, int $accountId): AccountOwnerDTO
    {
        return new self($name, $email, $password, $accountId);
    }
}
